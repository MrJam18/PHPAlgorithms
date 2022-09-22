<?php
declare(strict_types=1);

namespace Jam18\BehavioralTemplates\Observing\Common;

class Vacancy 
{
    public function __construct(
        private int $requiredWorkExperience,
        private string $name)
    {
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param int $requiredWorkExperience
     */
    public function setRequiredWorkExperience(int $requiredWorkExperience): void
    {
        $this->requiredWorkExperience = $requiredWorkExperience;
    }

    /**
     * @return int
     */
    public function getRequiredWorkExperience(): int
    {
        return $this->requiredWorkExperience;
    }
}