<?php
class RebelShip extends AbstractShip
{
    /**
     * @return string
     */
    public function getFavJedi()
    {
        $coolJedi = array(
            'Ben Kanobi',
            'Yoda'
        );

        $key = array_rand($coolJedi);

        return $coolJedi[$key];
    }

    /**
     * @return string
     */
    public function getType()
    {
        return 'Rebel';
    }

    /**
     * @return bool
     */
    public function isFunctional()
    {
        return true;
    }

    /**
     * @param bool $useShortFormat
     * @return string
     */
    public function getNameAndSpecs($useShortFormat = false)
    {
        return parent::getNameAndSpecs($useShortFormat) . ' (Rebel)';
    }

    /**
     * @return int
     */
    public function getJediFactor()
    {
        return rand(10, 30);
    }
}