<?php
declare(strict_types=1);


use Jam18\BehavioralTemplates\Command\Actions\Copy;
use Jam18\BehavioralTemplates\Command\Actions\Cut;
use Jam18\BehavioralTemplates\Command\Actions\Paste;
use Jam18\BehavioralTemplates\Command\Common\Command;
use Monolog\Handler\StreamHandler;
use Monolog\Level;
use Monolog\Logger;

require_once '../vendor/autoload.php';

$text = 'Tidelift delivers commercial support and maintenance for the open source dependencies you use to build your applications. Save time, reduce risk, and improve code health, while paying the maintainers of the exact dependencies you use.';

$logger = new Logger('task3');

$logger->pushHandler(new StreamHandler('log/error.log', Level::Error));
$logger->pushHandler(new StreamHandler('log/info.log', Level::Info));

$cut = new Cut($text, 1, 10);
$copy = new Copy($text, 3, 12);
$paste = new Paste($text, 'one two trip', 17);

$cutCommand = new Command($cut, $logger);
$copyCommand = new Command($copy, $logger);
$pasteCommand = new Command($paste, $logger);

echo $cutCommand->execute() . "\n";
echo $cutCommand->getText() . "\n";
echo $cutCommand->cancel() . "\n";
echo $copyCommand->execute() . "\n";
echo $copyCommand->getText() . "\n";
echo $copyCommand->cancel() . "\n";
echo $pasteCommand->execute() . "\n";
echo $pasteCommand->getText() . "\n";
echo $pasteCommand->cancel() . "\n";
