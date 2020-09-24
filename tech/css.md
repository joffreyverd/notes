```css

/* target the odd childrens of the table which have the 'brown-odd' class the following style */
table.brown-odd tr:nth-child(odd) {
    background-color: #CAC5BC;
}

/* target all the tr in the 'sortable' id, except the first-one */
#sortable tr:not(:first-child) {
    cursor: grab;
}

/* Implement flexbox on IE10/11 */
.myClass {
    display: flex;
    display: -ms-flexbox;
    justify-content: space-around;
}
