# CS362 Charcoal Compliance Demo

This repository contains an experimental PHP application exploring the [Charcoal](https://github.com/locomotivemtl/charcoal-core) architecture. It was created for the CS362 class to present compliance metrics, summaries, and a curated Q&A section. The project mixes a stripped down copy of **charcoal-core** with a custom app layer built around Twig templates.

> **Status**: Proof‑of‑concept. A complete router and web front controller are not included, so the code is intended for reference rather than direct deployment.

## Project Goals

* Demonstrate an MVC style using Charcoal models and loaders.
* Provide example controllers and Twig views for a compliance dashboard.
* Serve as a starting point for future coursework or experiments.

## Repository Layout

```
app/                Application code
  ├─ config/        Sample config with route map
  ├─ src/           Controllers, models, and services
  └─ views/         Twig templates
src/Charcoal/       Trimmed copy of the charcoal-core library
example-project/    Upstream boilerplate for reference only
```

## Running Tests

Unit tests require PHP 8 and PHPUnit:

```bash
composer install
vendor/bin/phpunit
```

The container used for this cleanup pass cannot install dependencies, so tests may fail here. They should run in a full PHP environment.

## Highlight: Q&A Search Service

The `QADataService` class stores a small in-memory FAQ and exposes simple helper methods. The search feature scans questions and answers while returning model objects:

```php
public function searchQAItems(string $query): array
{
    $query = strtolower($query);

    $filtered = array_filter($this->qaData, function ($item) use ($query) {
        return strpos(strtolower($item['question']), $query) !== false ||
               strpos(strtolower($item['answer']), $query) !== false;
    });

    return array_map(function ($data) {
        return QAItem::fromArray($data);
    }, $filtered);
}
```

This small example shows how Charcoal models can be combined with service classes for tidy, testable business logic.

## Next Steps

1. Implement a router and HTTP front controller (see `app/config/config.php` for intended routes).
2. Add persistence for compliance metrics and Q&A data.
3. Flesh out the example tests and integrate with a CI workflow.

