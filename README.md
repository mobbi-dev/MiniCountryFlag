# MiniCountryFlag

MiniCountryFlag is a tiny PHP class that converts ISO 3166-1 alpha-2 country codes (like `FI`, `US`, `JP`) into flag emojis (🇫🇮 🇺🇸 🇯🇵).  

Perfect for small projects, websites, or any application that needs to display country flags from ISO codes in a lightweight way.

---

## 🚀 Features

- Converts valid 2-letter country codes (e.g. `FI`, `US`, `JP`) to flag emojis (🇫🇮 🇺🇸 🇯🇵)
- Validates input (throws exception on invalid codes)
- Lightweight

---

## 🔧 Usage

```php

use MiniCountryFlag\MiniCountryFlag;

$flag = new MiniCountryFlag('fi');
echo $flag->getEmoji(); // 🇫🇮
echo $flag->getName(); // Finland
echo $flag->getFlagImageUrl(); // https://flagcdn.com/24x18/fi.png
```
