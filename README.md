# Reproducer project for issue [symfony/ux#1263](https://github.com/symfony/ux/pull/1263#discussion_r1568192555)

- [ ] Run `symfony serve`
- [ ] Go to [https://127.0.0.1:8000/](https://127.0.0.1:8000/)
- [ ] Check you browser `console` (`alt + cmd + j`).
- [ ] And you should see the `registerables` logged (with `chart.js` versions (`3.9.1` and `4.4.2`))

Switch between `chart.js` versions (`3.9.1` and `4.4.2`) in `importmap.php`. And run `symfony console importmap:install` accordingly.

## Ease development

By replacing following content `composer.json`.

```json
"repositories": [
    {
        "type": "path",
        "url": "./lib/ux/src/Chartjs",
        "options": {
            "symlink": true
        }
    }
]
```

And make sure to clone your own `ux`-repo in the `lib/ux` directory; 

```bash
cd lib && git clone git@github.com:<username>/ux.git
```

And run 
```bash
symfony composer update
```

## Share the reproducer

Make sure to commit all changes in your `ux`-repo, push them, change back th`composer.json`.

```json
"repositories": [
    {
        "type": "vcs",
        "url": "git@gitlab.com:<username>/ux.git"
    }
]
```

And run
```bash
symfony composer update
```
