<?php

namespace app\models;

use Yii;
use yii\data\Pagination;

/**
 * This is the model class for table "category".
 *
 * @property int $id Уникальный идентификатор
 * @property int|null $parent_id Родительская категория
 * @property string|null $name Название категория
 * @property string|null $content Описание категория
 * @property string|null $image Имя файла изображения
 *
 * @property Product[] $products
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['name', 'content', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Родительская категория',
            'name' => 'Имя категории',
            'content' => 'Описание',
            'image' => 'Картинка',
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['category_id' => 'id']);
    }

    /**
     * Метод описывает связь таблицы БД `category` с таблицей `category`
     */
    public function getParent() {
        return $this->hasOne(self::class, ['id' => 'parent_id']);
    }

    /**
     * Метод описывает связь таблицы БД `category` с таблицей `category`
     */
    public function getChildren() {
        return $this->hasMany(self::class, ['parent_id' => 'id']);
    }

    /**
     * Возвращает информацию о категории с иденификатором $id
     */
    public function getCategory($id) {
        return self::find()->where(['id' => $id])->asArray()->one();
    }


    public function getProductsCount()
    {
        return $this->getProducts()->count();
    }

    public static function getAll()
    {
        return Category::find()->all();
    }

    public static function getProductsByCategory($id)
    {
        // build a DB query to get all articles
        $query = Product::find()->where(['category_id'=>$id]);

        // get the total number of articles (but do not fetch the article data yet)
        $count = $query->count();

        // create a pagination object with the total count
        $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>6]);

        // limit the query using the pagination and retrieve the articles
        $products = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $data['products'] = $products;
        $data['pagination'] = $pagination;

        return $data;
    }

    /**
     * Возвращает всех родителей категории с идентификатором $id
     */
    public function getParents($id) {
        $parents = [];
        $current = self::findOne($id);
        $parents[] = $current;
        while ($current = self::findOne($current->parent_id)) {
            $parents[] = $current;
        }
        return array_reverse($parents);
    }

    /**
     * Возвращает массив идентификаторов всех потомков категории $id,
     * т.е. дочерние, дочерние дочерних и так далее
     */
    protected function getAllChildIds($id) {
        $children = [];
        $ids = $this->getChildIds($id);
        foreach ($ids as $item) {
            $children[] = $item;
            $c = $this->getAllChildIds($item);
            foreach ($c as $v) {
                $children[] = $v;
            }
        }
        return $children;
    }

    /**
     * Возвращает массив идентификаторов дочерних категорий (прямых
     * потомков) категории с уникальным идентификатором $id
     */
    protected function getChildIds($id) {
        $children = self::find()->where(['parent_id' => $id])->asArray()->all();
        $ids = [];
        foreach ($children as $child) {
            $ids[] = $child['id'];
        }
        return $ids;
    }

    /**
     * Возвращает массив всех категорий каталога в виде дерева
     */
    public static function getAllCategories($parent = 0, $level = 0, $exclude = 0) {
        $children = self::find()
            ->where(['parent_id' => $parent])
            ->asArray()
            ->all();
        $result = [];
        foreach ($children as $category) {
            // при выборе родителя категории нельзя допустить
            // чтобы она размещалась внутри самой себя
            if ($category['id'] == $exclude) {
                continue;
            }
            if ($level) {
                $category['name'] = str_repeat('— ', $level) . $category['name'];
            }
            $result[] = $category;
            $result = array_merge(
                $result,
                self::getAllCategories($category['id'], $level+1, $exclude)
            );
        }
        return $result;
    }

    /**
     * Возвращает массив всех категорий каталога для возможности
     * выбора родителя при добавлении или редактировании товара
     * или категории
     */
    public static function getTree($exclude = 0, $root = false) {
        $data = self::getAllCategories(0, 0, $exclude);
        $tree = [];
        // при выборе родителя категории можно выбрать значение
        // «Без родителя» — это будет категория верхнего уровня
        if ($root) {
            $tree[0] = 'Без родителя';
        }
        foreach ($data as $item) {
            $tree[$item['id']] = $item['name'];
        }
        return $tree;
    }

}
