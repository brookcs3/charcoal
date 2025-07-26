# Architecture Notes

This demo is intentionally lightweight. Controllers return plain arrays that Twig templates render. A router would map HTTP paths to the controller classes defined in `app/config/config.php`.

```mermaid
flowchart TD
    A[HTTP Request] --> B[Router]
    B --> C[Controller]
    C --> D[Model / Service]
    C --> E[View (Twig)]
```
