describe('Category Factory', function () {
    'use strict';

    var categoryFactory, mockBackend;

    beforeEach(module('CategoryModule'));

    beforeEach(inject(function (_CategoryFactory_, _$httpBackend_) {
        categoryFactory = _CategoryFactory_;
        mockBackend = _$httpBackend_;
    }));

    describe('CategoryFactory Default', function () {
        it('should have a default url', function () {
            expect(categoryFactory.url).toBe('category.php');
        });
    });

    describe('CategoryFactory Column Definitions', function () {
        it('should have a column definition', function () {
            expect(categoryFactory.getColumnDefinition()).toEqual([
                { 
                    field : 'action', 
                    displayName : 'Action' 
                } 
            ]);
        });
    });

    describe('CategoryFactory GetCategories', function () {
        it('should have a column definition', function () {
            var data;
            mockBackend.expectGET('https://lsnt.com/controllers/category.php').respond(categoriesMock);
            categoryFactory.getCategories().then(function(_data_) {
                data = _data_; 
            });

            mockBackend.flush();

            expect(data[0].categoryId).toBe(1);
            expect(data[0].category).toBe('First Category');
        });
    });
});
