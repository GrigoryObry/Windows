<?php
/**
 * Постоение дерева 
 */

class TreeMenu {
 
    private $_db = null;
    private $_category_arr = array();
 
    public function __construct($db) {
        //Подключаемся к базе данных, и записываем подключение в переменную _db
        $this->_db = $db;
        
		//В переменную $_category_arr записываем все категории (см. ниже)
        $this->_category_arr = $this->_getCategory();
		
		$this->_category_tree = $this->buildTree($this->_category_arr);
    }
 
    /**
     * Метод читает из таблицы category все сточки, и 
     * возвращает двумерный массив, в котором первый ключ - id - родителя 
     * категории (parent_id)
     * @return Array 
     */
    private function _getCategory() {
        $query = $this->_db->prepare("SELECT * FROM menu WHERE active = 1 ORDER BY sort ASC"); //Готовим запрос
        $query->execute(); //Выполняем запрос
        //Читаем все строчки и записываем в переменную $result
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
		
        return $result;
    }
	
	/**
	 * Метод формирует из полского массива - иерархический
	 */
	public function buildTree(array &$elements, $parentId = 0) {
		$branch = array();

		foreach ($elements as $element) {
			if ($element['parent_id'] == $parentId) {
				$children = $this->buildTree($elements, $element['id']);
				if ($children) {
					$element['children'] = $children;
				}
				$branch[$element['id']] = $element;
			}
		}
		return $branch;
	}
	
	public function getMenuHtml($items = array()) {
		$items = (!empty($items)) ? $items : $this->_category_tree;
		
		foreach ($items as $item) {
			// Если ссылка одиночная
			if ($item['is_auth']  && empty($_SESSION['user_session'])) continue;
			
			if (empty($item['children']) && ($item['sort']==300)) {
				//echo '<li><a href="' . $item['href'] . '">' . $item['title'] . '</a></li>';
				echo "<li><a href=\"{$item['href']}\" data-toggle=\"modal\" data-target=". $item['data_target'].">{$item['title']}</a></li>";
			}else
			if (empty($item['children'])) {
				//echo '<li><a href="' . $item['href'] . '">' . $item['title'] . '</a></li>';
				echo "<li><a href=\"{$item['href']}\">{$item['title']}</a></li>";
			} else {
				echo '<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">' . $item['title'] . ' <span class="caret"></span></a>
				<ul class="dropdown-menu">';
				$this->getMenuHtml($item['children']);
				echo '</ul>';
			}
		}
	}
 
}
