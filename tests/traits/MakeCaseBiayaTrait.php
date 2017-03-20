<?php

use Faker\Factory as Faker;
use App\Models\CaseBiaya;
use App\Repositories\CaseBiayaRepository;

trait MakeCaseBiayaTrait
{
    /**
     * Create fake instance of CaseBiaya and save it in database
     *
     * @param array $caseBiayaFields
     * @return CaseBiaya
     */
    public function makeCaseBiaya($caseBiayaFields = [])
    {
        /** @var CaseBiayaRepository $caseBiayaRepo */
        $caseBiayaRepo = App::make(CaseBiayaRepository::class);
        $theme = $this->fakeCaseBiayaData($caseBiayaFields);
        return $caseBiayaRepo->create($theme);
    }

    /**
     * Get fake instance of CaseBiaya
     *
     * @param array $caseBiayaFields
     * @return CaseBiaya
     */
    public function fakeCaseBiaya($caseBiayaFields = [])
    {
        return new CaseBiaya($this->fakeCaseBiayaData($caseBiayaFields));
    }

    /**
     * Get fake data of CaseBiaya
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCaseBiayaData($caseBiayaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'kase_id' => $fake->randomDigitNotNull,
            'customer_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $caseBiayaFields);
    }
}
