<?php
declare(strict_types=1);

use Jam18\BehavioralTemplates\Observing\Common\Vacancy;
use Jam18\BehavioralTemplates\Observing\Observable\LabourExchange;
use Jam18\BehavioralTemplates\Observing\Observers\VacancySearcher;

require_once '../vendor/autoload.php';

$vacancy = new Vacancy(5, 'hardWork');
$vacancy2 = new Vacancy(2, 'easyWork');
$searcher1 = new VacancySearcher('jamDoer', 'mr.jam12@yabdex.dsa', 5);
$searcher2 = new VacancySearcher('easyWorker', 'easy@123.es', 2);
$searcher3 = new VacancySearcher('hardWorker', 'hard@987.hd', 20);

$searchers = [$searcher1, $searcher2, $searcher3];
$labourExchange = new LabourExchange($searchers);

$labourExchange->addVacancy($vacancy);
$labourExchange->addVacancy($vacancy2);
$labourExchange->detach($searcher2);
$labourExchange->notify();
