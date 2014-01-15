<?php
header("Content-Type: text/html; charset=utf-8");
class BookController extends Controller
{
	public function actionIndex()
	{
		$model=new Book;
		$model->title='Огонь изнутри';
		$model->author='Кастанеда';
        $model->year='1960';
		$model->save(false);
        //$arr = array(3,4);
        $num = 4;
        //$a = Book::model()->findAllByAttributes(array('id'=>array(1,2,3,4,5),'title'=>'Война и Мир'));
        //foreach($a as $b){
        //   echo $b->title.'<br />';
        //}
        //echo $a->title;
	}
}
/*
    find
    findAll
    findByPk
    FindAllByPk
    findBy Attributes
    findAllByAttributes
    findBySql
    findAllBySql
    count
    countBySql
    exists

    updateAll
    updateByPk
*/
?>