# Splitee 1.0.1

This plugin splits ExpressionEngine content into a set number of sections.

## Parameters

```php
splitter="\n" - next element to split content at (defaults to new line)
columns="2" - number of columns to split content into
delimiter="</div><div>" - seperator to be returned between split column paragraphs
```

## Usage

```html
<div>
{exp:splitee delimiter="</div><div>"}
<p>Test 1</p>
<p>Test 2</p>
{/exp:splitee}
</div>

<div>
<p>Test 1</p>
</div>
<div>
<p>Test 2</p>
</div>
```

## License

Copyright 2014 Caddis Interactive, LLC

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

	http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.