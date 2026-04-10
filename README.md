# JoseLab PHP

A personal PHP laboratory for working on algorithms, data structures, and standalone problem-solving tasks.

## Includes

- Docker for quick start
- Composer autoloading
- Independent and self-contained implementations
- PHPUnit testing setup
- Simple runner script

## Quick start

### 1. Start Docker

```bash
docker compose up -d --build
```

### 2. Install dependencies

```bash
docker compose exec app composer install
```

### 3. Run the examples

```bash
docker compose exec app php bin/run.php
```

### 4. Run tests

```bash
docker compose exec app vendor/bin/phpunit
```

## Project structure

```text
joselab-php/
├── bin/
│   └── run.php
├── src/
│   └── Implementations/
├── tests/
│   └── Implementations/
├── composer.json
├── composer.lock
├── phpunit.xml
├── docker-compose.yml
├── Dockerfile
└── README.md
```

## How to add a new implementation

1. Create a new class in `src/Implementations`.
2. Use the namespace `JoseLab\Php\Implementations`.
3. Create a corresponding test in `tests/Implementations`.
4. Run:

```bash
docker compose exec app composer dump-autoload
```

## Useful Docker commands

Open a shell:

```bash
docker compose exec app bash
```

Run the main runner:

```bash
docker compose exec app php bin/run.php
```

Run tests:

```bash
docker compose exec app vendor/bin/phpunit
```

Stop containers:

```bash
docker compose down
```

## Notes

This repository is intentionally flexible. Each implementation is self-contained and may explore a specific concept, approach, or problem without dependencies on other parts of the codebase.
