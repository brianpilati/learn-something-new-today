describe('Restangular stuff', function () {
    var lsntRestangular;

    beforeEach(module('LSNTShared'));

    describe('LSTRestangular Properties', function() {
        beforeEach(inject(function(_LSNTRestangular_) {
            lsntRestangular = _LSNTRestangular_;
        }));

        it('should have a baseUrl attribue', function () {
            expect(lsntRestangular.configuration.baseUrl).toBe('https://lsnt.com/controllers');
        });

        describe('getIdFromElem ', function() {
            it('should get an element id', function () {
                var elem = {
                    id: 22
                };
                expect(lsntRestangular.configuration.getIdFromElem(elem)).toBe(22);
            });
        });
    });
});
