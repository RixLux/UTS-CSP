# API Documentation - Online Book Management

Sistem ini menyediakan API untuk mengelola kategori dan buku (PDF) dengan otentikasi menggunakan Laravel Sanctum.

## API Reference

<details markdown="1">
<summary>Click to see details</summary>

<swagger-ui src="./assets/api.json"/>

</details>

## Base URL

<details markdown="1">
<summary>Click to see details</summary>

`http://127.0.0.1:8000/api` (Sesuaikan dengan port server lokal Anda)

</details>

## Authentication

<details markdown="1">
<summary>Click to see details</summary>

### 1. Register
Mendaftarkan user baru untuk mendapatkan akses API.

- **Method:** `POST`
- **URL:** `/register`
- **Headers:**
    - `Accept: application/json`
- **Body:**
```json
{
    "name": "User Name",
    "email": "user@example.com",
    "password": "password",
    "password_confirmation": "password"
}
```
- **Response:** `200 OK` (Berisi access_token)

### 2. Login
Masuk ke sistem untuk mendapatkan access token.

- **Method:** `POST`
- **URL:** `/login`
- **Headers:**
    - `Accept: application/json`
- **Body:**
```json
{
    "email": "user@example.com",
    "password": "password"
}
```
- **Response:** `200 OK` (Berisi access_token)

---

</details>

## Category Management

<details markdown="1">
<summary>Click to see details</summary>

Endpoint ini digunakan untuk mengelola kategori buku. Semua endpoint di bawah ini membutuhkan header:
`Authorization: Bearer {your_token}`

### 1. List Categories
Menampilkan semua kategori.
- **Method:** `GET`
- **URL:** `/categories`

### 2. Store Category
- **Method:** `POST`
- **URL:** `/categories`
- **Body:**
```json
{
    "name": "Programming"
}
```

### 3. Update Category
- **Method:** `PUT/PATCH`
- **URL:** `/categories/{id}`
- **Body:**
```json
{
    "name": "Advanced Programming"
}
```

### 4. Delete Category
- **Method:** `DELETE`
- **URL:** `/categories/{id}`

---

</details>

## Book Management

<details markdown="1">
<summary>Click to see details</summary>

Semua endpoint di bawah ini membutuhkan header:
`Authorization: Bearer {your_token}`

### 1. List Books (with Search, Filter, & Pagination)
- **Method:** `GET`
- **URL:** `/books`
- **Query Params:**
    - `search`: Cari berdasarkan judul atau penulis (e.g., `?search=Laravel`)
    - `category_id`: Filter berdasarkan ID kategori (e.g., `?category_id=1`)
    - `page`: Nomor halaman (Pagination 5 data per halaman)
- **Response Example:**
```json
{
    "data": [
        {
            "id": 1,
            "category_id": 1,
            "title": "Mastering Laravel",
            "author": "John Doe",
            "description": "Learn Laravel in 30 days.",
            "pdf_url": "https://example.com/books/laravel.pdf",
            "price": 50.0,
            "created_at": "...",
            "updated_at": "..."
        }
    ],
    "links": { ... },
    "meta": { ... }
}
```

### 2. Store Book
- **Method:** `POST`
- **URL:** `/books`
- **Body:**
```json
{
    "title": "Eloquent ORM Deep Dive",
    "category_id": 1,
    "author": "Jane Doe",
    "description": "Comprehensive guide to Eloquent.",
    "price": 45.0,
    "pdf_url": "https://example.com/books/eloquent.pdf"
}
```

### 3. Show Book Detail
- **Method:** `GET`
- **URL:** `/books/{id}`

### 4. Update Book
- **Method:** `PUT/PATCH`
- **URL:** `/books/{id}`
- **Body:** (Semua field bersifat opsional)
```json
{
    "title": "Eloquent ORM Deep Dive v2",
    "price": 49.99
}
```

### 5. Delete Book
- **Method:** `DELETE`
- **URL:** `/books/{id}`

---

</details>

## Standard Response Format

<details markdown="1">
<summary>Click to see details</summary>

Semua response data menggunakan `JsonResource` untuk standarisasi:

- Data utama dibungkus dalam key `"data"`.
- Untuk endpoint list buku, terdapat key `"links"` dan `"meta"` untuk informasi pagination.
- Header `Accept: application/json` wajib digunakan untuk mendapatkan response error validasi dalam format JSON.

</details>

