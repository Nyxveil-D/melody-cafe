---
version: alpha
name: Melody Cafe
description: Calm cafe editorial design with pastel charm and restrained whimsy.
colors:
  background: "#FFF8F3"
  surface: "#FFFFFF"
  surface-soft: "#FFF0F2"
  primary: "#C85C78"
  primary-hover: "#A94461"
  primary-soft: "#F6D5DC"
  secondary: "#7B5361"
  accent: "#E5A54B"
  text: "#33252B"
  muted-text: "#725F67"
  border: "#E8D9D5"
  success: "#3E8060"
  warning: "#A66A24"
  error: "#B84251"
  admin-background: "#F5F6F8"
  admin-surface: "#FFFFFF"
  admin-primary: "#5B526B"
  admin-text: "#252631"
typography:
  display:
    fontFamily: Fraunces, Georgia, serif
    fontSize: 4.5rem
    fontWeight: 700
    lineHeight: 1.05
  heading:
    fontFamily: DM Sans, system-ui, sans-serif
    fontSize: 2.5rem
    fontWeight: 700
    lineHeight: 1.15
  body:
    fontFamily: DM Sans, system-ui, sans-serif
    fontSize: 1rem
    fontWeight: 400
    lineHeight: 1.55
  ui:
    fontFamily: DM Sans, system-ui, sans-serif
    fontSize: 1rem
    fontWeight: 600
    lineHeight: 1.25
rounded:
  sm: 8px
  input: 10px
  md: 16px
  feature: 20px
  panel: 24px
  pill: 999px
spacing:
  1: 4px
  2: 8px
  3: 12px
  4: 16px
  6: 24px
  8: 32px
  12: 48px
  16: 64px
  20: 80px
  28: 112px
layout:
  narrow: 720px
  standard: 1120px
  wide: 1280px
  desktop-gutter: 32px
  tablet-gutter: 24px
  mobile-gutter: 16px
controls:
  button-primary-height: 48px
  button-compact-height: 40px
  cta-height: 56px
  input-height: 48px
  textarea-min-height: 120px
  touch-target-min-height: 44px
  touch-target-min-width: 44px
shadows:
  sm: "0 1px 3px rgba(51, 37, 43, 0.08)"
  md: "0 6px 18px rgba(51, 37, 43, 0.10)"
  lg: "0 16px 40px rgba(51, 37, 43, 0.14)"
components:
  button-primary:
    backgroundColor: "{colors.primary}"
    textColor: "#FFFFFF"
    rounded: "{rounded.input}"
    height: "{controls.button-primary-height}"
  button-primary-hover:
    backgroundColor: "{colors.primary-hover}"
    textColor: "#FFFFFF"
    rounded: "{rounded.input}"
  button-secondary:
    backgroundColor: "{colors.surface}"
    textColor: "{colors.secondary}"
    rounded: "{rounded.input}"
  card:
    backgroundColor: "{colors.surface}"
    textColor: "{colors.text}"
    rounded: "{rounded.md}"
---

## Overview

Melody Cafe uses three visual proportions:

- 70% calm cafe editorial: warm whitespace, readable typography, clear hierarchy, restrained surfaces.
- 20% pastel charm: blush pink, soft cream, gentle curves, ribbon and floral references.
- 10% decorative whimsy: small original cafe motifs such as bows, flowers, music notes, and teacups.

My Melody-inspired atmosphere means soft pink, cozy sweetness, and gentle decorative language. Do not use unlicensed My Melody character artwork, copied character silhouettes, Sanrio trademarks, or recognizable proprietary assets. Original motifs may support the brand; they must never compete with content or controls.

Customer pages are Decide + Explore surfaces. Reservation is Configure. Admin is Operate + Monitor. Composition must follow each surface purpose; do not turn admin screens into marketing pages.

## Colors

Customer semantic tokens:

- `background` (`#FFF8F3`): warm cream page background.
- `surface` (`#FFFFFF`): cards, forms, and navigation surfaces.
- `surface-soft` (`#FFF0F2`): soft pink panels and highlights.
- `primary` (`#C85C78`): main actions and active emphasis.
- `primary-hover` (`#A94461`): hover and pressed action state.
- `primary-soft` (`#F6D5DC`): selected tabs and soft emphasis.
- `secondary` (`#7B5361`): secondary actions and supporting accents.
- `accent` (`#E5A54B`): price or decorative highlight, not long text.
- `text` (`#33252B`): headings and primary copy.
- `muted-text` (`#725F67`): supporting copy and metadata.
- `border` (`#E8D9D5`): fields, cards, and dividers.
- `success` (`#3E8060`): positive availability and completion.
- `warning` (`#A66A24`): caution and pending state.
- `error` (`#B84251`): validation and destructive state.

Admin semantic tokens:

- `admin-background` (`#F5F6F8`): neutral application background.
- `admin-surface` (`#FFFFFF`): panels, forms, and tables.
- `admin-primary` (`#5B526B`): navigation and primary admin actions.
- `admin-text` (`#252631`): admin headings and content.

Rules:

- Never use pastel color as body text when contrast is insufficient.
- Use explicit status text; color alone never communicates state.
- Customer pink/cream tokens do not define admin surfaces.
- No additional colors are approved in this specification.

## Typography

Fraunces is display-only: brand wordmark, hero title, and major page title. Fallback: Georgia, serif.

DM Sans serves headings, body, labels, buttons, navigation, tables, and other UI. Fallback: system sans-serif.

Hierarchy:

- Hero title: desktop 56–72px, mobile 38–46px, weight 700, line-height 1.05–1.10.
- Page title: desktop 44–52px, mobile 32–38px, weight 700, line-height 1.10–1.20.
- Section heading: desktop 32–40px, mobile 26–32px, weight 700, line-height 1.15.
- Card heading: desktop 20–24px, mobile 18–21px, weight 700.
- Large body: desktop 18px, mobile 17px, weight 400, line-height 1.55.
- Body: 16px, weight 400, line-height 1.55.
- Label: 14px, weight 600.
- Button/UI: 15–16px, weight 600, sentence case.
- Caption: 12–14px, weight 500.

Keep reading lines near 60–75 characters. Avoid all-caps except short labels. Use consistent numeric styling for prices and admin statistics.

## Layout

Use these maximum content widths:

- Narrow: `720px` for forms and focused reading.
- Standard: `1120px` for ordinary page content.
- Wide: `1280px` for grids, dashboards, and broad layouts.

Gutters:

- Desktop: `32px`.
- Tablet: `24px`.
- Mobile: `16px`.

Customer desktop may use editorial two-column sections; tablet reduces to two-column where content remains legible; mobile stacks content. Menu grid: three columns desktop, two tablet, one mobile. Admin desktop uses sidebar plus content; tablet may collapse sidebar; mobile uses drawer and stacked records.

## Spacing

Use the approved scale: `4px`, `8px`, `12px`, `16px`, `24px`, `32px`, `48px`, `64px`, `80px`, `112px`.

Use smaller values inside controls and cards, `24–32px` for related groups, `48–80px` for sections, and `112px` only for major hero/story separation. Do not invent arbitrary spacing values without a demonstrated layout need.

## Shapes

- `8px`: compact controls.
- `10px`: inputs and standard buttons.
- `16px`: standard cards.
- `20px`: feature cards.
- `24px`: hero/image panels.
- `999px`: badges, pills, and compact filters.

Do not round every container. Radius communicates grouping and emphasis.

## Elevation & Depth

- `sm`: subtle customer card separation and small controls.
- `md`: raised menu cards and active customer panels.
- `lg`: modals and reservation confirmation surfaces.
- Customer shadows use warm, low-opacity plum values.
- Admin uses the same restrained levels but should favor neutral borders and gray depth over decorative floating surfaces.
- Prefer one border plus light shadow over heavy elevation.

## Controls

- Primary button: `48px` height.
- Compact button: `40px` height.
- Large CTA: `52–56px` height; token default `56px`.
- Input/select: `48px` height.
- Textarea: minimum `120px` height; vertical resize allowed.
- Every touch target: minimum `44px` by `44px`.

## Components

### Navbar

Customer navbar: Melody wordmark left, Home/Menu/Reservation/About/Contact navigation, Reservation as primary CTA. Mobile collapses to a labeled menu control. Active route uses text plus subtle underline or soft pill. Include visible focus and expanded/collapsed state. Keep decoration minimal.

### Footer

Cream or deep-plum section with logo, short description, navigation, hours, location, social placeholders, and compact legal row. Do not duplicate all page content.

### Button

Primary uses `primary` with white text; hover uses `primary-hover`. Secondary uses surface, border, and secondary text. Tertiary is a text link. Destructive is reserved for admin. Disabled states remain identifiable and do not pretend to be interactive. Loading retains action meaning.

### Input

Persistent label above field, optional helper text, error below field, `48px` height, border, and visible focus ring. Placeholder never replaces label.

### Select

Native-select behavior is preferred. Same height and focus treatment as input. Include a non-submittable placeholder when needed. Remain keyboard accessible for long category lists.

### Textarea

Minimum `120px`; vertically resizable. Preserve content after validation failure. Add character guidance only when relevant.

### Card

Surface plus border, consistent padding, clear heading hierarchy, and restrained shadow only when elevation helps. Avoid unnecessary nested cards and repetitive icon toppers.

### Badge

Use explicit labels such as `Available`, `Currently unavailable`, or category name. Success uses pale green treatment; unavailable uses muted gray or pink. Status is never color-only.

### Menu Card

Image or original placeholder, category, item name, short description, price, and availability in that order. Keep essential content visible without hover. Use consistent image ratio and card height rhythm. Unavailable items remain understandable and visibly subdued.

### Category Filter

Include `All`. Desktop uses tabs or pills; mobile uses horizontal scroll or select. Active state uses `primary-soft` with readable text. Filters must be keyboard reachable and must not unexpectedly reset context.

### Reservation Form

Group fields into visit details, guest details, and special request. Show labels, required markers, policy copy, validation summary, field errors, submitting state, success state, and safe failure state. Preserve values and prevent duplicate submission.

### Contact Form

Name, email, optional phone, and message. Put contact details beside form on desktop and before form on mobile. Show field and submission errors, preserve values, and confirm expected response time after success.

### Alert

Use `status` for success and `alert` for errors. Top summary explains action; field errors sit beside fields. Success/error copy states what happened and what user should do next.

### Modal

Use for confirmation or focused tasks only. Destructive admin deletion requires confirmation. Trap focus, close on Escape, restore focus to trigger, and become full-width or full-screen on mobile.

### Admin Sidebar

Neutral slate/plum system, not customer pink. Items: Dashboard, Menu Categories, Menu Items, Reservations, and only implemented sections. Active item uses muted lavender/plum emphasis. Labels remain visible; icons support but do not replace labels. Collapse to drawer on mobile.

### Admin Table

Use white surface, neutral border, clear headers, row hover, and explicit actions. Menu columns may include name, category, price, availability, updated, and actions. Destructive action is separated and confirmed. Mobile uses stacked records or controlled horizontal scroll. Add pagination/filtering only when data volume requires it.

### Empty State

State what is empty, explain next action, and provide one primary action. Do not show a blank grid or decorative illustration without guidance.

### Loading State

Use skeleton cards/rows that preserve layout. Loading buttons retain context and prevent duplicates. Do not rely on motion alone; respect reduced-motion preferences.

## Customer vs Admin Separation

Customer pink/cream exists to create warmth, appetite, and emotional connection. Admin screens support repeated operational work: scanning, editing, comparing, and acting. Pink-heavy decoration would reduce density, weaken hierarchy, and make destructive or status states harder to distinguish. Admin therefore uses neutral gray surfaces, white panels, muted indigo/plum actions, compact spacing, and restrained shadows. Brand connection may remain in the wordmark or a small accent, never as the primary data-surface language.

## Accessibility

Target WCAG 2.2 AA.

- Normal text and normal UI text target at least `4.5:1` contrast.
- Large text targets at least `3:1` contrast.
- Focus indicator targets at least `3:1` against adjacent colors and remains visibly 2–3px.
- Every interactive element has a logical keyboard path.
- Menus and modals expose state, support Escape, and restore focus appropriately.
- Every field has a persistent label; required state is textual; errors are associated with fields and summarized before forms.
- Touch targets are at least `44px` square with adequate separation.
- Do not use hover-only information.
- Respect `prefers-reduced-motion`; remove nonessential transitions and animation.
- Availability, validation, reservation, and system status use text or programmatic labels in addition to color.
- Meaningful images have useful alt text; decorative images have empty alt text.
- Provide a skip link and semantic landmarks in future implementation.

## Color Contrast Matrix

Calculated with the WCAG relative-luminance contrast formula using the exact approved hex values. `AA normal` means at least `4.5:1`; `AA large` means at least `3:1`. These values cover important text/background combinations; component states must be checked again when rendered.

| Foreground | Background | Ratio | AA normal | AA large | Intended use |
|---|---|---:|---|---|---|
| `text` `#33252B` | `background` `#FFF8F3` | 13.87:1 | Pass | Pass | Customer body/headings |
| `text` `#33252B` | `surface` `#FFFFFF` | 14.58:1 | Pass | Pass | Card/form content |
| `muted-text` `#725F67` | `background` `#FFF8F3` | 5.63:1 | Pass | Pass | Supporting text |
| `muted-text` `#725F67` | `surface` `#FFFFFF` | 5.92:1 | Pass | Pass | Metadata/helper text |
| `primary` `#C85C78` | `surface` `#FFFFFF` | 3.99:1 | Fail | Pass | Large text or non-text emphasis only; not normal text |
| `primary-hover` `#A94461` | `surface` `#FFFFFF` | 5.70:1 | Pass | Pass | Hover links/text |
| `secondary` `#7B5361` | `surface` `#FFFFFF` | 6.46:1 | Pass | Pass | Secondary text |
| `success` `#3E8060` | `surface` `#FFFFFF` | 4.71:1 | Pass | Pass | Status text |
| `warning` `#A66A24` | `surface` `#FFFFFF` | 4.46:1 | Fail | Pass | Large text/non-text plus explicit label |
| `error` `#B84251` | `surface` `#FFFFFF` | 5.34:1 | Pass | Pass | Error text |
| `accent` `#E5A54B` | `text` `#33252B` | 6.81:1 | Pass | Pass | Accent text on dark text surface |
| `admin-text` `#252631` | `admin-background` `#F5F6F8` | 13.87:1 | Pass | Pass | Admin content |
| `admin-text` `#252631` | `admin-surface` `#FFFFFF` | 15.00:1 | Pass | Pass | Admin panels/tables |
| `admin-primary` `#5B526B` | `admin-surface` `#FFFFFF` | 7.33:1 | Pass | Pass | Admin links/actions |
| `surface` `#FFFFFF` | `primary` `#C85C78` | 3.99:1 | Fail | Pass | Primary button text: verify size/weight or darken button before implementation |
| `surface` `#FFFFFF` | `primary-hover` `#A94461` | 5.70:1 | Pass | Pass | Hover/pressed button text |

Important limitation: `primary` with white normal-sized button text does not meet AA normal under this calculation. Future implementation must not claim full AA for that combination without changing approved usage or token value. Use it for large/bold text only, use a sufficiently large/bold control where applicable, or flag for design approval before changing tokens.

## Token Naming Convention

Use stable semantic names, independent of component or framework:

- Colors: `--color-background`, `--color-surface`, `--color-primary`, `--color-primary-hover`, `--color-text`, `--color-muted-text`, `--color-border`, `--color-success`, `--color-warning`, `--color-error`.
- Admin colors: `--color-admin-background`, `--color-admin-surface`, `--color-admin-primary`, `--color-admin-text`.
- Spacing: `--space-1` through `--space-28`, mapped to the documented scale.
- Radius: `--radius-sm`, `--radius-input`, `--radius-md`, `--radius-feature`, `--radius-panel`, `--radius-pill`.
- Shadows: `--shadow-sm`, `--shadow-md`, `--shadow-lg`.
- Layout: `--layout-narrow`, `--layout-standard`, `--layout-wide`, plus gutter tokens.
- Controls: semantic names such as `--control-button-primary-height`, not page-specific names.

Names describe meaning, not literal color or location. Components consume semantic tokens rather than hard-coded values.

## Implementation Notes

Future implementation should expose these tokens through the project's chosen styling mechanism, without requiring this document to prescribe CSS, Tailwind, JavaScript, Blade, or another framework. Keep one source of truth for token values. Map semantic tokens directly to framework utilities or component styles; do not duplicate hex values across templates.

Load customer and admin token groups through separate layout contexts. Reuse component behavior and accessibility rules, but allow separate surface, text, shadow, and emphasis tokens. Validate contrast after actual font sizes, weights, borders, focus rings, disabled states, and hover states are applied. Treat this file as design intent, not permission to change backend behavior.

## Compliance Checklist

- [ ] Customer pages follow 70% calm editorial, 20% pastel charm, 10% decorative whimsy.
- [ ] No unlicensed My Melody/Sanrio artwork, trademark, or copied character asset appears.
- [ ] Approved customer and admin token values remain unchanged.
- [ ] Admin uses neutral gray/white/plum language, not pink-heavy customer surfaces.
- [ ] Fraunces is display-only; DM Sans serves UI/body; fallbacks exist.
- [ ] Typography sizes, weights, and line-height guidance match this file.
- [ ] Spacing, radius, shadow, layout, and control dimensions use documented tokens.
- [ ] Menu grid is three columns desktop, two tablet, one mobile.
- [ ] Reservation and contact forms preserve values and expose field/form errors.
- [ ] All controls have at least 44px touch targets; inputs are 48px high.
- [ ] WCAG 2.2 AA contrast is checked against this matrix and actual rendered states.
- [ ] Primary pink button treatment is not claimed AA-normal without resolving the documented 3.99:1 result.
- [ ] Focus indicator is visible and at least 3:1 against adjacent colors.
- [ ] Keyboard navigation, modal focus behavior, mobile menu state, and Escape behavior work.
- [ ] Status uses text/programmatic labels, not color alone.
- [ ] Reduced-motion behavior is implemented.
- [ ] Meaningful images have alt text; decorative images are hidden from assistive technology.
- [ ] Only `DESIGN.md` is changed for token-spec work.
