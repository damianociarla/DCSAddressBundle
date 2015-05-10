DCSAddressBundle
================

Installing
---

`composer require damianociarla/address-bundle`

in `app/config/AppKernel.php`

```
$bundles = array(
//...
  new Doctrine\Bundle\MongoDBBundle\DoctrineMongoDBBundle(),
  new \Bazinga\Bundle\GeocoderBundle\BazingaGeocoderBundle(),
  new DCS\AddressBundle\DCSAddressBundle(),
);

Configuration
---

```
# add doctrine types for geo-enabled types and query
# mysql tip: consider mysql-server >= 5.6 to get better spatial support
doctrine:
  dbal:
    # ...
    types:
      geometry:   CrEOF\Spatial\DBAL\Types\GeometryType
      point:      CrEOF\Spatial\DBAL\Types\Geometry\PointType
      polygon:    CrEOF\Spatial\DBAL\Types\Geometry\PolygonType
      linestring: CrEOF\Spatial\DBAL\Types\Geometry\LineStringType
    mapping_types:
      polygon: polygon
      point:   point
      linestring: linestring
  orm:
    # ...
    dql:
      numeric_functions:
        st_contains:     CrEOF\Spatial\ORM\Query\AST\Functions\PostgreSql\STContains
        st_distance:     CrEOF\Spatial\ORM\Query\AST\Functions\PostgreSql\STDistance
        st_area:         CrEOF\Spatial\ORM\Query\AST\Functions\PostgreSql\STArea
        st_length:       CrEOF\Spatial\ORM\Query\AST\Functions\PostgreSql\STLength
        st_geomfromtext: CrEOF\Spatial\ORM\Query\AST\Functions\PostgreSql\STGeomFromText
#...

# bundle configurations
dcs_address:
    db_driver: orm
    model:
        address: AcmeBundle\Entity\Address

```

Implementation
---

```

<?php

namespace AcmeBundle\Entity;

use DCS\AddressBundle\Entity\Address as BaseAddress;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="addresses")
 */
class Address extends BaseAddress
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    function getId() {
        return $this->id;
    }

}

```
