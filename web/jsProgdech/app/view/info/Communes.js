/**
 * Information sur les communes sélectionnées.
 */
Ext.define('jsProgdech.view.info.Communes', {
    extend: 'Ext.panel.Panel',
    alias: ['widget.infoCommunes'],
    id: 'infoCommunes',

    requires: [
        'jsProgdech.view.info.CommunesController',
        'jsProgdech.view.info.CommunesView',
    ],

    controller: 'infoCommunes',
    viewModel: 'infoCommunes',

    title: 'Sélection',
    bodyPadding: '0 3',

    items: [{
        xtype: 'displayfield',
        fieldLabel: 'Communes',
        bind: '{countCommune}'
    }, {
        xtype: 'displayfield',
        fieldLabel: 'Points de collecte',
        bind: '{countPointsCollecte}'
    }]
});
