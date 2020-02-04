<?php
/**
 * Постоение дерева 
 */

class wndScale {
 
    private $_db = null;
    private $_category_arr = array();
 
    public function __construct($db) {
        //Подключаемся к базе данных, и записываем подключение в переменную _db
        $this->_db = $db;
        
		//В переменную $_category_arr записываем все категории (см. ниже)
        $this->_category_arr = $this->_getScale();
		
		$this->_category_tree = $this->wndScale($this->_category_arr);

    }
 
    /**
     * Метод читает из таблицы category все сточки, и 
     * возвращает двумерный массив, в котором первый ключ - id - родителя 
     * категории (parent_id)
     * @return Array 
     */
	
private function _getScale()
	{
		$query = $this->_db->prepare("SELECT * FROM scalelist ORDER BY type ASC"); //Готовим запрос
        $query->execute(); //Выполняем запрос
        //Читаем все строчки и записываем в переменную $result
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
		
        return $result;
	}

	public function wndScale(array &$elements, $active = 1) {
		$branch = array();

		foreach ($elements as $element) {
			if ($element['active'] == $active) {
				if ($active) {
					$element['active'] = $active;
				}
				$branch[$element['type']] = $element;
			}
		}
		return $branch;
	}

	public function getWidth($items = array()) {
		$items = (!empty($items)) ? $items : $this->_category_tree;
		
		foreach ($items as $item) {
			if (!empty($item['type'] == 1)) {
				echo 'value="'. $item['width'] .'"';
			}		
		}
	}




}


?>







