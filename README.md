# 📘 Laravel Model Docs MD

A Laravel package that automatically generates **Model Documentation in Markdown format (.md)**.
Perfect for documenting your application's Eloquent models — their attributes, relationships, casts, and more.

---

## 🚀 Features

* 📄 Generate Markdown documentation for all Eloquent models in one file
* ⚙️ Configurable output directory and formatting
* 🧠 Detects attributes, relationships, casts, fillable, hidden, and appended fields
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

This command will inspect all models in your app/Models directory and generate a single file named:

storage/app/model-docs.md

Each model will be represented as a section in the file, similar to this:

## 🧩 App\Models\User
**Table:** `users`


**Columns:**


| Name | Type | Cast |
|------|------|------|
| id | bigint | int |
| name | varchar | - |
| email | varchar | - |
| password | varchar | - |


**Fillable:** name, email, password  
**Hidden:** password, remember_token  
**Appends:** is_verified  


**Relationships:**
- **posts** → Post

All models will be appended sequentially in this same Markdown file — allowing you to have a complete model documentation in one place.

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
