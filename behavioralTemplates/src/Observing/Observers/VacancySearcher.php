<?php
declare(strict_types=1);

namespace Jam18\BehavioralTemplates\Observing\Observers;

use Jam18\BehavioralTemplates\Observing\Observable\LabourExchange;
use SplObserver;
use SplSubject;

class VacancySearcher implements SplObserver
{

    public function __construct(
        private string $name,
        private string $email,
        private int $workExperience,
    )
    {

    }


    public function update(SplSubject $splSubject): void
    {
       $name = 'unknown';
       if($splSubject instanceof LabourExchange) $name = $splSubject->getNewVacancy()->getName();
       $text = "New vacancy with name $name was published in HandHunter.gb. You are qualified for this";
       $this->emailNotify($text);
    }

    private function emailNotify($text)
    {
        echo "$this->name get email with text: $text. \n";
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return int
     */
    public function getWorkExperience(): int
    {
        return $this->workExperience;
    }

    /**
     * @param int $workExperience
     */
    public function setWorkExperience(int $workExperience): void
    {
        $this->workExperience = $workExperience;
    }
}