<?php
namespace Blog\BlogBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Blog
{
    /** 
	 * @ORM\Id
	 * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /** @ORM\Column(type="string", length=100) */
    protected $titulo;

    /** @ORM\Column(type="text", nullable=True) */
    protected $contenido;

    /**
     * @ORM\ManyToOne(targetEntity="Blog\BlogBundle\Entity\Autor")
     */
    protected $autor;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     * @return Blog
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    
        return $this;
    }

    /**
     * Get titulo
     *
     * @return string 
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set contenido
     *
     * @param string $contenido
     * @return Blog
     */
    public function setContenido($contenido)
    {
        $this->contenido = $contenido;
    
        return $this;
    }

    /**
     * Get contenido
     *
     * @return string 
     */
    public function getContenido()
    {
        return $this->contenido;
    }

    /**
     * Set autor
     *
     * @param \Blog\BlogBundle\Entity\Autor $autor
     * @return Blog
     */
    public function setAutor(\Blog\BlogBundle\Entity\Autor $autor = null)
    {
        $this->autor = $autor;
    
        return $this;
    }

    /**
     * Get autor
     *
     * @return \Blog\BlogBundle\Entity\Autor 
     */
    public function getAutor()
    {
        return $this->autor;
    }
}