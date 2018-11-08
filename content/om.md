---
views:
    kursrepo:
        region: sidebar-right
        template: anax/v2/block/default
        data:
            meta:
                type: single
                route: block/om-kursrepo

    redovisa:
        region: sidebar-right
        template: anax/v2/block/default
        data:
            meta:
                type: single
                route: block/om-redovisa
---
Om
=========================

Jag har egentligen inget vettigt att säga i den här texten så nu handlar den om mitt tema för hemsidan.

Jag valde att skriva en egen layoutfil `view/anax/v2/layout/horizon.php`, egen header `view/anax/v2/header/custom.php`
och även en egen navbar `view/anax/v2/navbar/custom.php` för att det skulle passa den stil och det tema jag ville ha.

Jag har även dragit in bootstrap ifall jag skulle vilja styla något med hjälp av det.

En av fördelarna med att skriva sin stil i less är att man kan nesta olika regler, enkla variabler som fungerar i alla webbläsare och
använda fördefinierade funktioner så som darken(). Nedan följer ett exempel på hur mina figures för bilder är stilade.
```less
figure {
    padding: 5px;
    background: @secondaryBgColor;
    box-shadow: 3px 3px 5px darken(@primaryBgColor, 8%);
    figcaption {
        padding: 3px;
        font-style: italic;
        color: @blGrStart;
        p {
            margin: 0;
        }
    }
}
```
Såhär blir resultatet av less koden ovan:
[FIGURE src=image/eld.jpg?w=400 caption="this less code is lit"]
