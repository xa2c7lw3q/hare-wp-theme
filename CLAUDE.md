# CLAUDE.md

Guidance for AI assistants working in this repository.

## What this is

**Hare Theme** is a WordPress **classic theme** (not a block theme) for a fictional
men's hair salon, "Good life salon HARE" (山形・成沢). It was ported from a single
static `index.html` landing page into a minimal classic-theme file structure. The
only piece of dynamic behavior is a NEWS/お知らせ section on the front page that
pulls the latest posts via `WP_Query`.

- WordPress: classic theme (no `theme.json`, no block templates)
- Target stack: WordPress 7.0 / PHP 8.2 / MySQL 8.4
- Dependencies: none (no plugins, no build step, no package manager)
- Local dev was done with Local by Flywheel
- The repo root **is** the theme directory (drop it into `wp-content/themes/`)

The canonical project description lives in `README.md` (written in Japanese).

## File map

| File | Role |
|---|---|
| `style.css` | Theme header (`Theme Name: Hare Theme`) **and** all CSS for the whole site |
| `functions.php` | Enqueues `style.css` via `wp_enqueue_style` — the only PHP logic outside templates |
| `header.php` | `<!DOCTYPE>` → opening `<body>`, Google Fonts `<link>`s, `wp_head()`, fixed `<nav>` |
| `footer.php` | `<footer>`, scroll-reveal `IntersectionObserver` script, `wp_footer()`, closing tags |
| `front-page.php` | Front page body (hero + concept + menu + gallery + info + news + cta) |
| `index.php` | Fallback main template — **currently byte-for-byte identical to `front-page.php`** |
| `single.php` | Individual post page (the NEWS detail view) |
| `index.html` | The original static source page, kept **for reference only** — not loaded by WordPress |
| `README.md` | Project overview (Japanese) |

## How the pieces fit together

- Every template calls `get_header()` first and `get_footer()` last. Page-specific
  markup goes in between.
- `header.php` loads three Google Fonts directly via `<link>` (Shippori Mincho,
  Noto Serif JP, Cormorant Garamond). These are **not** enqueued through
  `functions.php` — only `style.css` is.
- The nav links use `home_url( '/' )` + anchor (e.g. `#concept`) so they jump to
  the right section from any page, not just the front page.
- `front-page.php` is the real homepage. WordPress uses `front-page.php`
  automatically when the site's front page is set to show latest posts or a static
  page. `index.php` exists as the required fallback.

### The one dynamic feature — NEWS section

In `front-page.php` (and the duplicated `index.php`), the News/お知らせ list is built
with a custom query:

```php
$hare_news = new WP_Query( array(
  'post_type'           => 'post',
  'posts_per_page'      => 5,
  'ignore_sticky_posts' => true,
) );
```

- Shows the latest **5** standard posts as `Y.m.d` date + title rows.
- Each row links to `single.php` via `the_permalink()`.
- When there are no posts, it renders `<p class="empty">現在お知らせはありません</p>`.
- Always followed by `wp_reset_postdata();` after the loop — keep this when editing.
- Adding a post in wp-admin → it appears here automatically. This is the intended
  content workflow for the site owner.

## Conventions to follow

- **Classic theme only.** Do not introduce `theme.json`, block templates, or
  Full Site Editing constructs. Keep the template-tag + PHP-loop style.
- **No build tooling.** Edit `style.css` directly. There is no Sass/PostCSS/npm
  pipeline — don't add one unless explicitly asked.
- **All CSS lives in `style.css`.** It is organized by section with comment headers
  (`/* nav */`, `/* hero */`, `/* menu */`, `/* news */`, etc.). Add new styles
  under the matching section, matching the existing terse, single-line-rule style.
- **Design system via CSS variables** defined in `:root` of `style.css`:
  `--bg #0a0a0a`, `--bg-soft #121212`, `--ink #ece7dc`, `--ink-dim #9c968a`,
  `--gold #d4af37`, `--gold-soft #b9972f`, `--line` (gold @ .22 alpha). The look is
  dark background + gold accent. Reuse these variables; don't hard-code new colors.
- **Typography helper classes:** `.mincho` (Shippori Mincho), `.latin` (Cormorant
  Garamond). Body default is Noto Serif JP. Japanese-language content is expected
  throughout the markup.
- **Scroll animation:** add the `reveal` class to an element to have it fade/slide
  in on scroll (handled by the `IntersectionObserver` in `footer.php`).
- **Escaping:** follow existing patterns — `esc_url()` for URLs, `esc_html()` for
  output like `get_the_date()`. The template tags `the_title()`, `the_content()`,
  `the_permalink()` are used as-is.
- **Cache busting:** `style.css` is enqueued with an explicit version string in
  `functions.php` (currently `'1.1'`). **Bump this version when you change
  `style.css`** so browsers pick up the new CSS. Note the `style.css` header
  `Version:` field (currently `1.0`) is the theme version and is separate.

### Keep `index.php` and `front-page.php` in sync

These two files are currently identical. If you change front-page markup (e.g. the
NEWS query or a section), the safe default is to apply the same change to both,
unless you are intentionally diverging them. Flag this duplication if a change makes
keeping them identical awkward — consolidating shared markup into a template part
(`get_template_part()`) is a reasonable refactor to propose.

## Testing / verifying changes

There is no automated test suite. To verify:

1. Place the repo in `wp-content/themes/hare-theme/` and activate the theme
   (Local by Flywheel or any WP 7.0 / PHP 8.2 environment).
2. Visit the front page — confirm all sections render and fonts load.
3. Add a post in wp-admin and confirm it appears in the NEWS section and that its
   permalink opens correctly in `single.php`.
4. For CSS-only changes, confirm the enqueue version was bumped and hard-refresh.

There is no linter configured; match the surrounding code style by hand.

## Git workflow

- Active development branch: `claude/claude-md-docs-uudaj7`.
- Push with `git push -u origin <branch>`; open a **draft** PR after pushing.
- Do not push to `main` without explicit permission.
