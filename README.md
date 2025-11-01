# 📘 Laravel Model Docs MD

A Laravel package that automatically generates **Model Documentation in Markdown format (.md)**.
Perfect for documenting your application's Eloquent models — their attributes, relationships, casts, and more.

---

## 🚀 Features

* 📄 Generate Markdown documentation for all Eloquent models
* ⚙️ Configurable output directory and formatting
* 🧠 Detects attributes, relationships, casts, and fillable fields
* 🕹️ Simple Artisan command
* 🧩 Fully open-source and easy to extend

---

## 🧪 Installation

Require the package via Composer:

```bash
composer require rakib01/laravel-model-docs-md
```

---

## ⚙️ Publish Configuration

You can publish the configuration file using:

```bash
php artisan vendor:publish --provider="Rakib01\\LaravelModelDocsMd\\ModelDocsMdServiceProvider" --tag=config
```

This will publish a config file at:

```
config/modeldocsmd.php
```

---

## 🧾 Generate Model Documentation

Once installed, simply run:

```bash
php artisan model-docs-md:generate
```

By default, the documentation will be generated inside:

```
storage/app/model-docs/
```

## 🛠️ Requirements

* PHP >= 8.1
* Laravel >= 12.x or 11.x, 10.x

---

## 🤝 Contributing

Pull requests are welcome!
If you find a bug or have a feature request, please open an issue on [GitHub Issues](https://github.com/Rakib01/laravel-model-docs-md/issues).

---

## 📄 License

This package is open-sourced software licensed under the **MIT license**.

---

**Created with ❤️ by [Rakibul Hasan](https://github.com/Rakib01)**
