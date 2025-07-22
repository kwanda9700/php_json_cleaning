# PHP JSON Cleaning Utility

This PHP utility attempts to recover partial or malformed JSON strings by truncating invalid trailing sections.

## 🧩 Problem

In real-world applications (e.g., logging, streaming APIs), JSON data may get cut off. This script tries to return the longest valid prefix.

## ✅ Features

- Handles nested objects/arrays
- Ignores content inside strings
- Returns a potentially valid JSON structure

## 🔧 Usage

```php
require_once 'src/Cleanup.php';

$cleaner = new JsonCleaner();
$fixedJson = $cleaner->clean($corruptedJson);
