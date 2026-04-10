# JoseLab PHP

A personal PHP laboratory for working on algorithms, data structures, and standalone problem-solving tasks.

## Includes

- Docker for quick start
- Composer autoloading
- Independent and self-contained implementations
- Simple runner script
- Example implementations of common problems

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

## Project structure

```text
joselab-php/
├── bin/
│   └── run.php
├── src/
│   └── Implementations/
├── composer.json
├── docker-compose.yml
├── Dockerfile
└── README.md
```

## How to add a new implementation

1. Create a new class in `src/Implementations`.
2. Use the namespace `JoseLab\Php\Implementations`.
3. Add a call in `bin/run.php` if you want to execute it from the main runner.
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

Stop containers:

```bash
docker compose down
```

## Notes

This repository is intentionally flexible. Each file is self-contained and may represent a standalone implementation, without dependencies on other parts of the codebase.