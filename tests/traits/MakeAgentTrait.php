<?php

use Faker\Factory as Faker;
use App\Models\Agent;
use App\Repositories\AgentRepository;

trait MakeAgentTrait
{
    /**
     * Create fake instance of Agent and save it in database
     *
     * @param array $agentFields
     * @return Agent
     */
    public function makeAgent($agentFields = [])
    {
        /** @var AgentRepository $agentRepo */
        $agentRepo = App::make(AgentRepository::class);
        $theme = $this->fakeAgentData($agentFields);
        return $agentRepo->create($theme);
    }

    /**
     * Get fake instance of Agent
     *
     * @param array $agentFields
     * @return Agent
     */
    public function fakeAgent($agentFields = [])
    {
        return new Agent($this->fakeAgentData($agentFields));
    }

    /**
     * Get fake data of Agent
     *
     * @param array $postFields
     * @return array
     */
    public function fakeAgentData($agentFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama_agent' => $fake->word,
            'alamat' => $fake->text,
            'email' => $fake->word,
            'no_telepon' => $fake->word,
            'user_id' => $fake->randomDigitNotNull,
            'agency_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $agentFields);
    }
}
