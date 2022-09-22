<?php
declare(strict_types=1);

namespace Jam18\BehavioralTemplates\Observing\Observable;

use Jam18\BehavioralTemplates\Observing\Common\CustomArrayObject;
use Jam18\BehavioralTemplates\Observing\Common\Vacancy;
use SplObserver;
use SplSubject;

class LabourExchange implements SplSubject
{
    private CustomArrayObject $vacancies;
    private CustomArrayObject $searchers;
    private Vacancy $newVacancy;

    public function __construct(array $searchers = [], array $vacancies = [])
    {
        $this->vacancies = new CustomArrayObject($vacancies);
        $this->searchers = new CustomArrayObject($searchers);
    }

    function addVacancy(Vacancy $vacancy)
    {
        $this->vacancies[] = $vacancy;
        $this->newVacancy = $vacancy;
        $this->notify();
    }

    function deleteVacancy(Vacancy $vacancy)
    {
        $this->vacancies->delete($vacancy);
    }

    public function attach(SplObserver $searher): void
    {
        $this->searchers[] = $searher;
    }

    public function detach(SplObserver $searcher): void
    {
        $this->searchers->delete($searcher);
    }

    public function notify(): void
    {
        foreach ($this->searchers as $searcher)
        {
            if($searcher->getWorkExperience() >= $this->newVacancy->getRequiredWorkExperience()) $searcher->update($this);
        }
    }

    /**
     * @return Vacancy
     */
    public function getNewVacancy(): Vacancy
    {
        return $this->newVacancy;
    }
}