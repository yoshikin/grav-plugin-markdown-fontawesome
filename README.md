# Grav Markdown Font Awesome Plugin

The **Font Awesome plugin** for [Grav](http://github.com/getgrav/grav) allows you to use Font Awesome icons inline with markdown by wrapping the icon name in colons (Github/Slack "emoji style"):

![Font Awesome flag icon](assets/fa-flag-to-icon.png)

**Note:** [N-Parsons/markdown-fontawesome](https://github.com/n-parsons/grav-plugin-markdown-fontawesome) is the new master repository for this plugin (see [getgrav/grav#2544](https://github.com/getgrav/grav/issues/2544)).

## Prerequisites

The plugin works by looking for colon-wrapped icon names starting with `fas fa-`, `far fa-`, `fal fa-`, or `fab fa-` (or `fa fa-` for Font Awesome 4), and converting them to `<i>` tags. Additional classes (including `fa-spin`, etc.) may be specified by including them at the end. Primarily for legacy reasons, the plugin also supports a shortened prefix format, namely `fa-`, which works for both Font Awesome 4 and 5, and inserts `<i class="fa fas fa-*"></i>`.

This plugin doesn't contain the actual Font Awesome fonts, so make sure you are using a plugin or theme (such as Learn2 or Antimatter) that include the Font Awesome assets.

## Conflicts

This plugin conflicts with definition lists in Markdown Extra; if enabled, icons appearing at the start of a line (with no non-whitespace character preceeding them) will be treated as part of a definition list and will be broken. This currently appears to be the only conflict.

If this conflict with Markdown Extra is an issue for you, you can either switch to [Shortcode Core](https://github.com/grav/grav-plugin-shortcode-core), or disable Markdown Extra per-page by adding the following to the page frontmatter:

```
markdown:
  extra: false
```

## Installation

### GPM (preferred method)

You can install the plugin by running `bin/gpm install markdown-fontawesome` or searching for `markdown-fontawesome` in the Admin Panel.

### Manual installation

Alternatively, you can download the zip version of this repository, unzip to `/your/site/grav/user/plugins` and rename the directory to `markdown-fontawesome`.

## Configuration

The `markdown-fontawesome.yaml` file contains only one configuration option, which turns the plugin on/off.

```
enabled: true
```

## Examples

```
Grab a cup of :fas fa-coffee: and write some :fal fa-code:
```

Will produce the following HTML:

```
Grab a cup of <i class="fas fa-coffee"></i> and write some <i class="fal fa-code"></i>
```

### Extra classes

Additional classes can be specified by appending them after the icon name.

- `:fa-code fa-spin:` -> `<i class="fa fa-code fa-spin"></i>`
- `:fas fa-code fa-spin icon:` -> `<i class="fas fa-code fa-spin icon"></i>`
- `:far fa-code literally any other classes:` -> `<i class="far fa-code literally any other classes"></i>`

## Known limitations

- Conflicts with Markdown Extra definition lists. If Markdown Extra is enabled, icons cannnot be placed at the start of a line and must have at least one non-whitespace character preceeding them.
- Icon names are not validated, so html tags are created even for non-existent icons like `:fa-not-a-real-icon:``

## Alternatives

If you prefer shortcode syntax, consider using the [Grav Shortcode Plugin](https://github.com/getgrav/grav-plugin-shortcode-core#fontawesome) which also supports Font Awesome via `[fa=cog extra=fas /]`.

## License

MIT license. See [LICENSE](LICENSE)

## Credits

This plugin was originally developed by (yoshikin)[https://github.com/yoshikin]. It was inspired by the python markdown extension [fontawesome-markdown](https://github.com/bmcorser/fontawesome-markdown) and the first version was based on code from the [Grav Markdown Color Plugin](https://github.com/getgrav/grav-plugin-markdown-color).
