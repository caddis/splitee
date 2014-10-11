<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

$plugin_info = array (
	'pi_name' => 'Splitee',
	'pi_version' => '1.0.1',
	'pi_author' => 'Caddis',
	'pi_author_url' => 'http://www.caddis.co',
	'pi_description' => 'Split a body of content into a set number of sections.',
	'pi_usage' => Splitee::usage()
);

class Splitee {

	public $return_data = '';

	public function __construct()
	{
		// Set string to tagdata

		$string = ee()->TMPL->tagdata;

		// Fetch parameters

		$splitter = ee()->TMPL->fetch_param('spltter', '\n');
		$columns = ee()->TMPL->fetch_param('columns', 2);
		$delimiter = ee()->TMPL->fetch_param('delimiter', '</div><div>');

		// Split the content

		$length = strlen($string);
		$split = ceil($length / $columns);

		$result = '';

		if (preg_match('/^(.{' . $split . '}[^' . $splitter . ']*)(.+)$/s', $string, $matches))
		{
			array_shift($matches);

			$i = 0;

			foreach ($matches as $key => $value)
			{
				$result .= (($i > 0) ? $delimiter : '') . $value;

				$i++;
			}
		}

		$this->return_data = $result;
	}

	public static function usage()
	{
		ob_start();
?>
Parameters:

splitter="\n" - next element to split content at (defaults to new line)
columns="2" - number of columns to split content into
delimiter="</div><div>" - seperator to be returned between split column paragraphs

Usage:

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
<?php
		$buffer = ob_get_contents();

		ob_end_clean();

		return $buffer;
	}
}
?>