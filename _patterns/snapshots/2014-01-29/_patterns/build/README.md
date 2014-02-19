# Jekyll version of Pattern-Primer by adactio

Forked from the [original Pattern-Primer for PHP by adactio (Jeremy Keith)](https://github.com/adactio/Pattern-Primer)

Inspired by [Ruby (Sinatra) version](https://github.com/micdijkstra/Pattern-Primer-Ruby)

## Pattern Primer

This is a design communication, testing and process tool.

Create little snippets of markup and save them to the "patterns folder" (called _posts in Jekyll). The pattern primer will generate a list of all the patterns in that folder. You will see the pattern rendered as HTML. You will also get the source displayed in a textarea.

## Why a Jekyll fork?

Why not? I wanted to implement the a version of Pattern-Primer for my Jekyll projects with only Jekyll dependencies (and no PHP dependencies). It can be [built locally with a Jekyll/Ruby environment](http://jekyllrb.com/docs/usage/) or uploaded as a static directory on a remote server – [here is an example of that](http://patternprimer.olivermak.es/). If anything, this tiny effort proves that you can build things other than hacker blogs with Jekyll.

## How to use it

1. If you haven't already, [install Jekyll](http://jekyllrb.com/).
2. Clone this repo.
3. Copy your CSS file to css/global.css (replacing adactio's stock CSS) *or* copy your own CSS to the css directory and direct a link in the HTML to that file.
4. Create your own HTML snippets and add them to the `_posts` folder.
5. Run the command `jekyll serve` and open <localhost:4000> in your browser.

**One quirk of using this in Jekyll** (or at least the quick way I created it) is that the patterns are stored in the "_posts" folder. Every post must have identical front matter that looks like this:

```
---
layout: pattern
---
```

... and each file must be named `yyyy-mm-dd-title.html`. The date tag is arbitrary, but this will determine where it appears in order on the index. The default is set to 0001-01-01 for the packaged HTML snippets, but anything named newer than that will appear at the bottom of the list.

## Other versions

- [PHP (original version)](https://github.com/adactio/Pattern-Primer)
- [Node.js](https://github.com/beardtwizzle/pattern-primer-on-node)
- [Ruby (Sinatra)](https://github.com/micdijkstra/Pattern-Primer-Ruby)

## This is what it looks like

<http://patternprimer.olivermak.es/>

Note: my version uses the standard styles written by adactio.

## Credits

The **original** [Pattern Primer is by adactio](https://github.com/adactio/Pattern-Primer) and should be used if you prefer PHP or aren't already using Jekyll. Many thanks to Jeremy for this great tool!
