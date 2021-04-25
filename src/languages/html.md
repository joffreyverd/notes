# HTML

```html

// Put data attribute into a div to do js call on it (for exemple)
<div class="myClass"
    title="myTitle"
    data-hello="hello"
    data-there="there"
>Hello there</div>

// Put a limit of characters in a text input
<input type='text' name='code' maxlength='6'>

// Force to have only numeric inputs in a field
<input oninput='callThis(this)'>
<script>
    function callThis(e) {
        e.value = e.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');
    }
</script>

// Deactivate the history of a field
<input autocomplete='off'>
```
