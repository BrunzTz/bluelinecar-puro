import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ContainerPageUtilsComponent } from './container-page-utils.component';

describe('ContainerPageUtilsComponent', () => {
  let component: ContainerPageUtilsComponent;
  let fixture: ComponentFixture<ContainerPageUtilsComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ ContainerPageUtilsComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(ContainerPageUtilsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
