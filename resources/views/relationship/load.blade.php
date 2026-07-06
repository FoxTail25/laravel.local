<x-layout>
    <x-slot:title>
        Ленивая и жадная загрузки в Laravel
    </x-slot:title>

    <h2>
        Ленивая и жадная загрузки в Laravel
    </h2>
    Связанные модели в Laravel загружаются отложено. Это значит, что SQL запрос выполняется в момент обращения к объекту
    модели. Это на самом деле плохо, так как выполняется большое количество запросов к базе. (та самая проблема N+1)
    Давайте посмотрим на примере.
    <br />
    Пусть у нас таблица с категориями связана с таблицей с постами отношением hasMany. Давайте для нашей категории
    переберем циклом коллекцию ее постов. В результате SQL запрос будет отправляться каждую итерацию цикла:
    <pre>
	class CategoryController extends Controller
	{
		public function show()
		{
			$category = Category::find(1);

			foreach ($category->posts as $post) {
				dump($post); // тут каждый раз шлется запрос
			}
		}
	}</pre>
    Для решения проблемы мы можем использовать жадную (нетерпеливую) загрузку. С помощью метода with мы можем заранее
    подгрузить данные связанной модели. Давайте сделаем это:
    <pre>
	class CategoryController extends Controller
	{
		public function show()
		{
			$category = Category::with(['post'])->first();
		}
	}</pre>
    Теперь при переборе циклом лишних запросов не будет:
    <pre>
	class CategoryController extends Controller
	{
		public function show()
		{
			$category = Category::with(['post'])->first();

			foreach ($category->posts as $post) {
				dump($post);
			}
		}
	}</pre>
    <div class="text-danger">
        Небольшое дополнение!
        <br />
        Метод all() в Eloquent — это статический метод, который нельзя вызывать по цепочке после методов построителя
        запросов (таких как with()). По этому надо использовать get() или first().
        <br />
        Имя передаваемое в with() === Имя, под которым записан метод в модели!!
        В прошлой задаче, мы создали модель Profession:
        <pre>
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Profession extends Model
    {
        public function employees(){
            return $this->belongsToMany(Employee::class);
        }
    }</pre>
        Теперь, если мы будем использовать "жадную" загрузку этой модели, то наш код будет выглядеть вот так:
        <pre>Profession::with(['employees'])->get();</pre> Имя, передаваемое в with(['']) === имя метода модели!!!
    </div>
    <h4 id="task1">
        Задачи:
    </h4>
    <a href="/relationship/load-task/1">
        Выберите несколько задач из предыдущих уроков и переделайте их код на жадную загрузку.
    </a>
    <br />
</x-layout>
