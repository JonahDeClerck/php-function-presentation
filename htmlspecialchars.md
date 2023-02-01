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
<!--_: ""-->
# <!--fit--> htmlspecialchars();
---
</style>

```php
htmlspecialchars(string, flags, character-set, double_encode );
```
<br><br>

<div class="columns">
<div>

* String 
* Flags 
* Character set 
* Double encode 

</div>
<div class="nld">

 :arrow_right: Input om te converteren  
 :arrow_right: Optioneel, veranderd behaviour ivm:  
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

* String doorgeven naar url 
* User input naar database sturen

</div>
<div>
<br><br><br>

 :arrow_right: XSS 
 :arrow_right: SQL injection

</div>

<br>
</div>

### [:information_source: Meer info](https://stackoverflow.com/questions/19584189/when-used-correctly-is-htmlspecialchars-sufficient-for-protection-against-all-x)
<sup>tldr; ```htmlspecialchars()``` alleen is niet altijd voldoende tegen alle vormen van Injection & XSS</sup>

---
# :symbols: Output

<br>

<div class="columns">
<div>

```<b>bold</b> blabla ```

<br>

</div>
<div>

```&lt;b&gt;bold&ltl;/b&gt; blabla ```


</div>
</div>

* Speciale characters worden "geneutraliseerd"
  (replaced door niet-speciale characters)
* Kan je eventueel nog gaan filteren, alles dat tussen ```%``` en ```;``` staat weghalen
---
# :computer: Example

```html
<form Method="post">
    <label for="input">Input:</label>
    <input type="field" name="input">
</form>
```
```php
$output = htmlspecialchars(

    $_POST['input'],    //Input
    ENT_QUOTES,         //Flags
    'UTF-8',            //Character-set
    FALSE               //Double encode
);
```

```html
<a><?=htmlentities($output)?></a>
```
---
# :book: Sources


- [W3schools (Duh)](https://www.w3schools.com/php/func_string_htmlspecialchars.asp)
- [Php manual](https://www.php.net/manual/en/function.htmlspecialchars.php)
- [deze Quora thread](https://www.quora.com/When-should-I-use-the-htmlspecialchars-function-in-PHP)
 <br>

# :link: Links


- [Github repo (.md file van presentatie :wink: & code van in't voorbeeld)]()