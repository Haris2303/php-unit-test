<?php

namespace Haris\Test;

use PHPUnit\Framework\TestCase;

class ProductServiceMockTest extends TestCase
{
    private ProductRepository $repository;
    private ProductService $service;

    protected function setUp(): void
    {
        $this->repository = $this->createMock(ProductRepository::class);
        $this->service = new ProductService($this->repository);
    }

    public function testMock()
    {
        $product = new Product();
        $product->setId("1");

        $this->repository->expects($this->once())
            ->method("findById")
            ->willReturn($product);

        $result = $this->repository->findById("1");
        self::assertSame($product, $result);
    }
    public function testDeleteSuccess()
    {
        $product = new Product();
        $product->setId("1");

        $this->repository->expects($this->once())
            ->method("delete")
            ->with(self::equalTo($product));

        $this->repository->expects(self::once())
            ->method("findById")
            ->willReturn($product)
            ->with(self::equalTo("1"));

        $this->service->delete("1");
        self::assertTrue(true, "Delete success");
    }

    public function testDeleteException()
    {
        $this->repository->expects($this->never())
            ->method("delete");

        $this->expectException(\Exception::class);
        $this->repository->expects(self::once())
            ->method("findById")
            ->willReturn(null)
            ->with(self::equalTo("1"));

        $this->service->delete("1");
    }
}
