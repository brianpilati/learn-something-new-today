getSingleCategoryMock = function(index) {
    index = index || 0;
    return categoriesMock.data[index];
};

var categoriesMock = {
    data: [
        {
            categoryId: 1,
            category: 'First Category'
        }
    ]
};
