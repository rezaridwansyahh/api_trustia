<?php

use Faker\Factory as Faker;
use App\Models\Agency;
use App\Repositories\AgencyRepository;

trait MakeAgencyTrait
{
    /**
     * Create fake instance of Agency and save it in database
     *
     * @param array $agencyFields
     * @return Agency
     */
    public function makeAgency($agencyFields = [])
    {
        /** @var AgencyRepository $agencyRepo */
        $agencyRepo = App::make(AgencyRepository::class);
        $theme = $this->fakeAgencyData($agencyFields);
        return $agencyRepo->create($theme);
    }

    /**
     * Get fake instance of Agency
     *
     * @param array $agencyFields
     * @return Agency
     */
    public function fakeAgency($agencyFields = [])
    {
        return new Agency($this->fakeAgencyData($agencyFields));
    }

    /**
     * Get fake data of Agency
     *
     * @param array $postFields
     * @return array
     */
    public function fakeAgencyData($agencyFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama_agency' => $fake->word,
            'alamat' => $fake->word,
            'email' => $fake->word,
            'no_telpon' => $fake->word,
            'pic' => $fake->word,
            'status' => $fake->randomDigitNotNull,
            'user_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $agencyFields);
    }
}
