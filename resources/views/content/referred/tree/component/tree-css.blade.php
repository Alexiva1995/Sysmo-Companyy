<style>
	.padre ul {
    padding-top: 20px;
    padding-left: 0px;
    position: relative;
    display: flex;
    overflow: auto;
    justify-content: center;
    transition: all 0.5s;
    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
}

.padre ul ul{
    padding-left: 0;
}

.padre .base{
    height: 100px;
    width: 100px;
}

.padre .baseli{
    width: 50%;
}

.padre li {
    float: left;
    text-align: center;
    list-style-type: none;
    position: relative;
    padding: 20px 40px 0;

    transition: all 0.5s;
    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
}

/*We will use ::before and ::after to draw the connectors*/

.padre li::before,
.padre li::after {
    content: '';
    position: absolute;
    top: 0;
    right: 50%;
    border-top: 2px solid #693ED0;
    width: 50%;
    height: 20px;
}

.padre li::after {
    right: auto;
    left: 50%;
    border-left: 2px solid #693ED0;
}

/*We need to remove left-right connectors from elements without 
any siblings*/
.padre li:only-child::after,
.padre li:only-child::before {
    display: none;
}

/*Remove space from the top of single children*/
.padre li:only-child {
    padding-top: 0;
}

/*Remove left connector from first child and 
right connector from last child*/
.padre li:first-child::before,
.padre li:last-child::after {
    border: 0 none;
}

/*Adding back the vertical connector to the last nodes*/
.padre li:last-child::before {
    border-right: 2px solid #693ED0;
    border-radius: 0 5px 0 0;
    -webkit-border-radius: 0 5px 0 0;
    -moz-border-radius: 0 5px 0 0;
}

.padre li:first-child::after {
    border-radius: 5px 0 0 0;
    -webkit-border-radius: 5px 0 0 0;
    -moz-border-radius: 5px 0 0 0;
}

/*Time to add downward connectors from parents*/
.padre ul ul::before {
    content: '';
    position: absolute;
    top: 0;
    left: 50%;
    border-left: 2px solid #693ED0;
    width: 0;
    height: 20px;
}

.padre li a {
    border: 2px solid #693ED0;
    /* padding: 8px 5px; */
    text-decoration: none;
    color: #666;
    font-family: arial, verdana, tahoma;
    font-size: 11px;
    display: inline-block;
    height: 60px;
    width: 60px;
    border-radius: 50%;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;

    transition: all 0.5s;
    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
}

/*Time for some hover effects*/
/*We will apply the hover effect the the lineage of the element also*/
.padre li a:hover,
.padre li a:hover+ul li a {
    background: #c8e4f8;
    color: #000;
    border: 2px solid #94a0b4;
}

/*Connector styles on hover*/
.padre li a:hover+ul li::after,
.padre li a:hover+ul li::before,
.padre li a:hover+ul::before,
.padre li a:hover+ul ul::before {
    border-color: #94a0b4;
}
</style>
