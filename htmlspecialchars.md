---
marp: true
theme: default
class: invert
style: |
    .columns{
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 1rem;
    }
    footer{
        font-size: 20px;
       margin-left: 1050px;
    }
footer: htmlspecialchars();

---
<!--_footer: ""-->
# <!--fit--> htmlspecialchars();
---

</style>

```php
htmlspecialchars(string, flags, character-set, double_encode );
```
<br><br>

<div class="columns">
<div>

- String 
- Flags 
<br>
- Character set 
- Double encode 

</div>
<div class="nld">

 :arrow_right: Input om te converteren  
 :arrow_right: Optioneel, veranderd behaviour ivm: quotes, invalid encoding & doctype
 
 :arrow_right: Bv. ```EUC-JP``` voor Japans, default ```UTF_8```
 :arrow_right: Non-special characters ook encoden?

</div>

---
# Ok, but why?

## :warning: Safety



<div class=columns>
<div>

### User input verwerken:
<br>

- String doorgeven naar url 
- User input naar database sturen

</div>
<div>
<br><br><br>

 :bangbang: XSS 
 :bangbang: SQL injection

</div>

<br>
</div>

### [:information_source: Meer info](https://stackoverflow.com/questions/19584189/when-used-correctly-is-htmlspecialchars-sufficient-for-protection-against-all-x)
<sup>tldr; ```htmlspecialchars()``` alleen is niet altijd voldoende tegen alle vormen van Injection & XSS</sup>

---
# :symbols: Output

<br><br>

<div class="columns">
<div>

```<b>bold</b> blabla ```

<br>

</div>
<div>

```&lt;b&gt;bold&ltl;/b&gt; blabla ```


</div>
</div>
<br>

- Speciale characters worden <i>"geneutraliseerd"</i>
- Kan je eventueel nog gaan filteren, ```/```'s en alles dat tussen ```%``` en ```;``` staat weghalen.

<br>

<sub>Output echo en var_dumpen geeft gewoon terug de originele characters weer, dus gebruik ```htmlentities()``` </sub>

---
# :computer: Example

```html
<form Method="post">
    <label for="input">Input:</label>
    <input type="field" name="input">
</form>
```
```php 
// 2x uitvoeren is enkel voor weergave (omdat browser terug decodeerd)
$output = htmlspecialchars(htmlspecialchars(      

    $_POST['input'],    //Input
    ENT_QUOTES,         //Flags
    'UTF-8',            //Character-set
    FALSE               //Double encode
));
```

```html
<a><?=$output?></a>
```
<!-- uitleggen waarom er 2x htmlspecialchars gedaan wordt. -->
---
# :book: Sources

- [Php manual (duh)](https://www.php.net/manual/en/function.htmlspecialchars.php)
- [W3schools ](https://www.w3schools.com/php/func_string_htmlspecialchars.asp)
- [deze Quora thread](https://www.quora.com/When-should-I-use-the-htmlspecialchars-function-in-PHP)
 <br>

# :link: Links


- [Github repo (.md file van presentatie :star_struck: & code van in't voorbeeld)](https://github.com/JonahDeClerck/php-function-presentation)