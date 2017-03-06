<?php

use Faker\Factory as Faker;
use App\Models\Nopol;
use App\Repositories\NopolRepository;

trait MakeNopolTrait
{
    /**
     * Create fake instance of Nopol and save it in database
     *
     * @param array $nopolFields
     * @return Nopol
     */
    public function makeNopol($nopolFields = [])
    {
        /** @var NopolRepository $nopolRepo */
        $nopolRepo = App::make(NopolRepository::class);
        $theme = $this->fakeNopolData($nopolFields);
        return $nopolRepo->create($theme);
    }

    /**
     * Get fake instance of Nopol
     *
     * @param array $nopolFields
     * @return Nopol
     */
    public function fakeNopol($nopolFields = [])
    {
        return new Nopol($this->fakeNopolData($nopolFields));
    }

    /**
     * Get fake data of Nopol
     *
     * @param array $postFields
     * @return array
     */
    public function fakeNopolData($nopolFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'no_polisi' => $fake->word,
            'wilayah_id' => $fake->randomDigitNotNull,
            'daerah' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $nopolFields);
    }
}
