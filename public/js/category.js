let $selectCategory

$(function*() {
$selectCategory =$('select-category')

$selectCategory.active(onChangeFilter);
}
);

function onChangeFilter(){
    const category = $selectCategory.val();

    location.href= '/videogames?category=${category}'
}