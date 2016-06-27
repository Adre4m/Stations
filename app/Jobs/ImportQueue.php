<?php

namespace App\Jobs;

use App\Importable;
use App\Interpreter\CSVInterpreter;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Message;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;
use Symfony\Component\HttpFoundation\File\File;

class ImportQueue extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $user;
    protected $className;
    protected $file;

    /**
     * Create a new job instance.
     * @param User $user
     * @param $className
     * @param File $file
     */
    public function __construct(User $user, $className, File $file)
    {
        $this->user = $user;
        $this->className = $className;
        $this->file = $file;
    }

    /**
     * Execute the job.
     *
     * @return array
     */
    public function handle()
    {
        $interpreter = new CSVInterpreter();
        $res = $interpreter
            ->forFile($this->file)
            ->forClass($this->className)
            ->getContent();
        $models = Importable::validateCollection($res);
        $user = $this->user;
        /** @var User $user */
        Mail::send('contributors.temp', ['user' => $user, 'messages' => $models],
            function ($message) use ($user) {
                /** @var Message $message */
                $message->from('no-reply-import-result@service.com', 'Import Result');
                $message->to($user->email, $user->name)->subject('Import Result');
            });
        return $models;
    }
}
