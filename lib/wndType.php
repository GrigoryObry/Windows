<?php
/**
 * Постоение дерева 
 */

class wndMenu {
 
    private $_db = null;
    private $_category_arr = array();
 
    public function __construct($db) {
        //Подключаемся к базе данных, и записываем подключение в переменную _db
        $this->_db = $db;
        
		//В переменную $_category_arr записываем все категории (см. ниже)
        $this->_category_arr = $this->_getWindows();
		
		$this->_category_tree = $this->wndType($this->_category_arr);

    }
 

	
	private function _getWindows()
	{
		$query = $this->_db->prepare("SELECT * FROM windows ORDER BY id ASC"); //Готовим запрос
        $query->execute(); //Выполняем запрос
        //Читаем все строчки и записываем в переменную $result
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
		
        return $result;
	}

	public function wndType(array &$elements, $active = 1) {
		$branch = array();

		foreach ($elements as $element) {
			if ($element['active'] == $active) {
				if ($active) {
					$element['active'] = $active;
				}
				$branch[$element['id']] = $element;
			}
		}
		return $branch;
	}


	public function getWindowsType($id) {
		$items = $this->_category_tree;
		
		foreach ($items as $item) {
			if (!empty($item['type'] == $id)) {
				echo '<div class="wndtype_f' . $id . ' wndtype_i'.$item['id'].'" onClick="img('.$item['id'].');"></div>';
			}		
		}
	}
}
