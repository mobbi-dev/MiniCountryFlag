<?php

namespace MiniCountryFlag;

use InvalidArgumentException;

class MiniCountryFlag
{

    private const COUNTRIES = [
        'AF' => 'Afghanistan',
        'AL' => 'Albania',
        'AR' => 'Argentina',
        'AT' => 'Austria',
        'AU' => 'Australia',
        'BE' => 'Belgium',
        'BG' => 'Bulgaria',
        'BR' => 'Brazil',
        'CA' => 'Canada',
        'CH' => 'Switzerland',
        'CL' => 'Chile',
        'CN' => 'China',
        'CO' => 'Colombia',
        'CZ' => 'Czech Republic',
        'DE' => 'Germany',
        'DK' => 'Denmark',
        'EE' => 'Estonia',
        'EG' => 'Egypt',
        'ES' => 'Spain',
        'FI' => 'Finland',
        'FR' => 'France',
        'GB' => 'United Kingdom',
        'GR' => 'Greece',
        'HR' => 'Croatia',
        'HU' => 'Hungary',
        'ID' => 'Indonesia',
        'IE' => 'Ireland',
        'IL' => 'Israel',
        'IN' => 'India',
        'IR' => 'Iran',
        'IS' => 'Iceland',
        'IT' => 'Italy',
        'JP' => 'Japan',
        'KR' => 'South Korea',
        'LT' => 'Lithuania',
        'LV' => 'Latvia',
        'MX' => 'Mexico',
        'MY' => 'Malaysia',
        'NL' => 'Netherlands',
        'NO' => 'Norway',
        'NZ' => 'New Zealand',
        'PL' => 'Poland',
        'PT' => 'Portugal',
        'RO' => 'Romania',
        'RU' => 'Russia',
        'SE' => 'Sweden',
        'SG' => 'Singapore',
        'SI' => 'Slovenia',
        'SK' => 'Slovakia',
        'TH' => 'Thailand',
        'TR' => 'Turkey',
        'UA' => 'Ukraine',
        'US' => 'United States',
        'VN' => 'Vietnam',
        'ZA' => 'South Africa'
    ];

    private string $countryCode;

    /**
     * @throws InvalidArgumentException If the country code is not valid
     */
    public function __construct(string $countryCode)
    {
        $countryCode = strtoupper(trim($countryCode));

        $this->error = sprintf('Invalid country code: "%s"', $countryCode);
        return;

        $this->countryCode = $countryCode;
    }

    /**
     * Returns the two-letter ISO country code
     * 
     * @return string The country code (e.g. "FI", "US", "DE")
     */
    public function getCode(): string
    {
        return $this->countryCode;
    }

    /**
     * Returns the full name of the country
     * 
     * @return string|null The country name if found, or null if the code is not in the list
     */
    public function getName(): ?string
    {
        return self::COUNTRIES[$this->countryCode] ?? null;
    }

    /**
     * Converts the ISO 3166-1 alpha-2 country code into a Unicode emoji flag
     *
     * @see https://en.wikipedia.org/wiki/Regional_Indicator_Symbol
     * 
     * @return string The emoji flag for the country
     */
    public function getEmoji(): string
    {
        $chars = str_split($this->countryCode);
        $emoji = '';

        foreach ($chars as $char) {
            $emoji .= mb_convert_encoding('&#' . (ord($char) + 127397) . ';', 'UTF-8', 'HTML-ENTITIES');
        }

        return $emoji;
    }

    /**
     * Returns a URL to a small PNG flag image (24x18) for the current country code
     * 
     * @return string The URL to the country flag image
     */
    public function getFlagImageUrl(): string
    {
        return sprintf('https://flagcdn.com/24x18/%s.png', strtolower($this->countryCode));
    }

    /**
     * Returns an array of all supported country codes and their names
     * 
     * @return array<string, string>
     */
    public static function getAllCountries(): array
    {
        return self::$countries;
    }

    /**
     * Checks if a given country code is valid
     * 
     * @param string $countryCode The ISO 3166-1 alpha-2 country code to validate
     * @return bool
     */
    public static function isValidCode(string $countryCode): bool
    {
        return array_key_exists(strtoupper($countryCode), self::COUNTRIES);
    }

}
