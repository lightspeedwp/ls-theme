# Spotlight Card Effect

Use the `Card Spotlight` style on a Group block to apply the GSAP spotlight card effect.

## How To Use It

1. Add a Group block.
2. Add your own heading, paragraph, buttons, or other inner blocks.
3. In the block Styles panel, select `Card Spotlight`.
4. Save and preview the page.

You can still apply the class `is-style-card-spotlight` manually if needed.

## What The Effect Does

- follows the pointer on fine-pointer devices
- uses the theme's lighter neutral and base tokens for the card shell
- uses the theme's `brand` palette for the spotlight glow
- keeps a visible focus state for keyboard users

## Notes

- The GSAP bootstrap lives in `inc/gsap.php`.
- The shared GSAP effect logic lives in `assets/js/gsap-effects.js`.
- The shared GSAP selectors live in `assets/css/gsap-animations.css`.
- Tune the live spotlight effect directly in `assets/css/gsap-animations.css`.
- No pattern content is bundled with this effect. Build your own patterns and apply the class where needed.
