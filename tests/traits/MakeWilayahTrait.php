<?php

use Faker\Factory as Faker;
use App\Models\Wilayah;
use App\Repositories\WilayahRepository;

trait MakeWilayahTrait
{
    /**
     * Create fake instance of Wilayah and save it in database
     *
     * @param array $wilayahFields
     * @return Wilayah
     */
    public function makeWilayah($wilayahFields = [])
    {
        /** @var WilayahRepository $wilayahRepo */
        $wilayahRepo = App::make(WilayahRepository::class);
        $theme = $this->fakeWilayahData($wilayahFields);
        return $wilayahRepo->create($theme);
    }

    /**
     * Get fake instance of Wilayah
     *
     * @param array $wilayahFields
     * @return Wilayah
     */
    public function fakeWilayah($wilayahFields = [])
    {
        return new Wilayah($this->fakeWilayahData($wilayahFields));
    }

    /**
     * Get fake data of Wilayah
     *
     * @param array $postFields
     * @return array
     */
    public function fakeWilayahData($wilayahFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama_wilayah' => $fake->word,
            'cakupan' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $wilayahFields);
    }
}
