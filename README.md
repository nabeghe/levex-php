# Levex (Level + Experience)

> A simple leveling and XP System for PHP, Just Like in Online Games.

Building a leveling system that showcases a user's level based on their experience points might seem like a daunting
task.
But fear not! Levex simplifies this process with just a few straightforward methods.
You can effortlessly implement this functionality without diving into complex calculations.
Enjoy a seamless experience as you elevate your users’ journey!

<hr>

## 🫡 Usage

### 🚀 Installation

You can install the package via composer:

```bash
composer require nabeghe/levex
```

<hr>

### Instance

#### Default Instance

Retrieve a singleton instance with default options:

```php
use Nabeghe\Levex\Levex;

$levex = Levex::instance();
```

#### Custom Instance

Retrieve a custom instance with custom options:

```php
use Nabeghe\Levex\Levex;

$options = ['baseLevelXp' => 50];
$levex = new Levex($options);
```

Options are related to class fields:

| Name                  | Description                                                                                                                                                                                                                         |
|-----------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `baseLevelXp`         | XP required to reach level 1. Default `100`.                                                                                                                                                                                        |
| `levelLogBase`        | Logarithmic base in calculating the level by XP. Default `3`.                                                                                                                                                                       |
| `priceXpRate`         | XP rate per unit of price. For example, if the rate is 10, every 10 units of a specified price will equal 1 XP. Default `1`.                                                                                                        |
| `godLevelSymbols`     | Symbols that indicate a level associated with the creator or God, rather than a regular level. Default `['∞']`.                                                                                                                     |
| `negativeLevelIsGod`  | Indicates whether a negative level should be considered as the god/creator or not. Default `true`.                                                                                                                                  |
| `levelNamesHandler`   | A callable that acts as a replacement for the determineLevelName method and takes the same input. If determineLevelName returns null, the main method will be executed. Used to customize the name/title of levels. Default `null`. | 

<hr>

### Global Configuration

use kyeword `const` or function `define`.

| Name                          | Description                             |
|-------------------------------|-----------------------------------------|
| `LEVEX_BASE_LEVEL_XP`         | related to `$levex->baseLevelXp`        |
| `LEVEX_LEVEL_LOG_BASE`        | related to `$levex->levelLogBase`       |
| `LEVEX_PRICE_XP_RATE`         | related to `$levex->priceXpRate`        |
| `LEVEX_GOD_LEVEL_SYMBOLS`     | related to `$levex->godLevelSymbols`    |
| `LEVEX_NEGATIVE_LEVEL_IS_GOD` | related to `$levex->negativeLevelIsGod` |

<hr>

### Methods

#### `calcLevel(int $xp): int`

Calculates which level corresponds to a given XP.

#### `calcRequiredXpToLevel(int $level): int`

Calculates the minimum XP required to reach a specified level.

#### `calcRemainingXpToLevel(int $level, $currentXP, &levelXP = null): int`

Calculates how much XP is remaining to reach a specific level.

**Notice:** The $levelXP is output of the calcRequiredXpToLevel()

#### `calcRemainingPercentToLevel(int $level, int $currentXP, int &$leftXP = 0): float|int`

Calculates how many percent of progress reamining to reaching a specific level.

**Notice:** The $levelXP is output of the remaining XP to reach the desired level.

#### `calcPassedPercentToLevel(int $level, int $currentXP, int &$leftXP = 0): float|int`

Calculates how many percent of progress has been made towards reaching a specific level.

**Notice:** The $levelXP is output of the remaining XP to reach the desired level.

#### `calcXpByPrice($price, ?float $rate = null): int`

Calculates how much XP can be earned from a given price.

Notice: The $rate is XP rate per unit of price.
For example, if the rate is 10, every 10 units of a specified price will equal 1 XP.
Default is option 'priceXpRate'.

#### `checkGodLevel($level): bool`

Checks whether the level is specific to the god or not.

#### `determineLevelName($level): string`

Retrives the name/title of a level.

<hr>

## 📖 License

Copyright (c) 2024 Hadi Akbarzadeh

Licensed under the MIT license, see [LICENSE.md](LICENSE.md) for details.