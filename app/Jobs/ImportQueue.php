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

    /**
     * Create a new job instance.
     * @param User $user
     * @param $className
     */
    public function __construct(User $user, $className)
    {
        $this->user = $user;
        $this->className = $className;
    }

    /**
     * Execute the job.
     *
     * @param File $file
     */
    public function handle(File $file)
    {
        $interpreter = new CSVInterpreter();
        $res = $interpreter
            ->forFile($file)
            ->forClass($this->className)
            ->getContent();
        $models = Importable::validateCollection($res);
        $user = $this->user;
        $class = $this->className;
        $plural = (isset($class::$plural)) ? $class::$plural : 2;
        $view_name = snake_case(str_plural(substr(static::class, strlen('App\\Models\\')), $plural));
        /** @var User $user */
        Mail::send("$view_name.temp", ['user' => $user, 'messages' => $models],
            function ($message) use ($user) {
                /** @var Message $message */
                $message->from('no-reply-import-result@service.com', 'Import Result');
                $message->to($user->email, $user->name)->subject('Import Result');
            });
    }
}
