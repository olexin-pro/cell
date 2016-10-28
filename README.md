# Cell
Cell: The wrapper on a package of "donquixote/cellbrush" for Laravel

## Install
Begin by installing the package through Composer.
```
composer require aizhar777/cell
```
Once this operation is complete, simply add both the service provider and facade classes to your project's config/app.php file:

#### Service Provider
```
Aizhar777\Cell\CellServiceProvider::class,
```

#### Facade
```php
'Cell' => Aizhar777\Cell\Facades\Cell::class,
```

## Basic usage

A simple 3x3 table with the diagonal cells filled. 

```php
namespace App\Http\Controllers;

class TestController extends Controller
{
    public function index()
    {
        $table = \Cell::create()
            ->addClass('table table-bordered')
            ->addRowNames(['row0', 'row1', 'row2'])
            ->addColNames(['col0', 'col1', 'col2'])
            ->td('row0', 'col0', 'Diag 0')
            ->td('row1', 'col1', 'Diag 1')
            ->td('row2', 'col2', 'Diag 2');
        
        return view('test_view', ['table' => $table->render()]);
    }
}

```
test_view.blade.php:
```html
<!-- ... -->
{{ $table }}
<!-- ... -->
```

#### Result
<table>
  <tbody>
    <tr><td>Diag 0</td><td></td><td></td></tr>
    <tr><td></td><td>Diag 1</td><td></td></tr>
    <tr><td></td><td></td><td>Diag 2</td></tr>
  </tbody>
</table>

#### Nested groups

Groups can have unlimited depth.

```php
$table = \Cell::create()
    ->addRowNames(['T', 'B.T', 'B.B.T', 'B.B.B'])
    ->addColNames(['L', 'R.L', 'R.R.L', 'R.R.R'])
    ->td('T', '', 'top')
    ->td('B', 'L', 'bottom left')
    ->td('B.T', 'R', 'B.T / R')
    ->td('B.B', 'R.L', 'B.B / R.L')
    ->td('B.B.T', 'R.R', 'B.B.T / R.R')
    ->td('B.B.B', 'R.R.L', 'B.B.B / R.R.L')
    ->td('B.B.B', 'R.R.R', 'B.B.B / R.R.R');
```
Result:
<table>
  <tbody>
    <tr><td colspan="4">top</td></tr>
    <tr><td rowspan="3">bottom left</td><td colspan="3">B.T / R</td></tr>
    <tr><td rowspan="2">B.B / R.L</td><td colspan="2">B.B.T / R.R</td></tr>
    <tr><td>B.B.B / R.R.L</td><td>B.B.B / R.R.R</td></tr>
  </tbody>
</table>

[More examples](https://github.com/donquixote/cellbrush/blob/1.0/README.md)


### Requires
[donquixote/cellbrush](https://github.com/donquixote/cellbrush)